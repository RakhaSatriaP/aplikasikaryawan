@extends('layouts.app')
@section('content')
<style>
    .time-display {
        font-size: 2rem;
        font-weight: bold;
        text-align: center;
    }
    .date-display {
        font-size: 1.5rem;
        text-align: center;
    }
</style>
<h1>Attendance</h1>
<div class="row mb-3">
    <div class="col-md-12">
        <div class="card">
            
            <div class="card-body">
                <div id="live-time" class="time-display"></div>
                {{-- <div id="live-date" class="date-display"></div> --}}
            </div>
            
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h1 class="">Masuk</h1>
            </div>
            @if(!$cek_date)
            <div class="card-body">
                <form action="{{ route('attendance.masuk') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="mb-3">
                        <div class="col-md @error('attendance_status') is-invalid @enderror">
                            <small class="text-dark fw-medium d-block">Status</small>
                            <div class="form-check form-check-inline ">
                              <input class="form-check-input" type="radio" name="attendance_status" id="Present" value="Present" />
                              <label class="form-check-label" for="Present">Present</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="attendance_status" id="Excuse" value="Excuse" />
                              <label class="form-check-label" for="Excuse">Excuse</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="attendance_status" id="Business trip" value="Business trip" />
                              <label class="form-check-label" for="Business trip">Business trip</label>
                            </div>
                          </div>
                    </div>
                    @error('attendance_status')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3" >
                        <label for="evidance" class="form-label">Evidance</label>
                        <input class="form-control form-control @error('evidance') is-invalid @enderror" id="evidance" type="file" name="evidance" >
                    </div>

                    <div class="mb-3">
                        <button type="button" class="btn btn-primary w-100" id="openCameraBtn">Open Camera</button>
                        <video id="webcam" width="100%" autoplay style="display:none; margin-top: 20px;"></video>
                        <button type="button" class="btn btn-warning w-100 mt-2 d-none" id="captureBtn">Capture</button>
                        <canvas id="canvas" style="display:none;"></canvas>
                        <input type="hidden" name="webcam_image" id="webcam_image">
                        <img id="capturedImage" src="" style="display:none; margin-top: 20px;" class="img-fluid" alt="Captured Image">
                    </div>
                    @error('evidance')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="btn btn-success w-100">Submit</button>
                </form>
            </div>
            @else
            <div class="card-body">
                <div class="alert alert-success" role="alert">
                    Anda sudah melakukan absen masuk hari ini {{ $cek_date->attendance_date }}
                </div>
            </div>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h1>Pulang</h1>
            </div>
            @if(!$cek_date_pulang)
            <div class="card-body">
                <form action="{{ route('attendance.pulang') }}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <button type="submit" class="btn btn-danger w-100">Submit</button>
                </form>
            </div>
            @else
            <div class="card-body">
                <div class="alert alert-danger" role="alert">
                    Anda sudah melakukan absen pulang hari ini {{ $cek_date_pulang->attendance_date }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    function updateTime() {
        var now = new Date();
        var options = {
            timeZone: 'Asia/Jakarta',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            weekday: 'long'
        };
        var timeString = now.toLocaleTimeString('id-ID', options);
        var dateString = now.toLocaleDateString('id-ID', options);

        document.getElementById('live-time').innerText = timeString;
        document.getElementById('live-date').innerText = dateString;
    }

    setInterval(updateTime, 1000);
    updateTime(); // Initial call to display the time immediately

    
</script>

<script>
    const video = document.getElementById('webcam');
    const canvas = document.getElementById('canvas');
    const captureBtn = document.getElementById('captureBtn');
    const webcamImage = document.getElementById('webcam_image');
    const capturedImage = document.getElementById('capturedImage');
    const openCameraBtn = document.getElementById('openCameraBtn');

    let stream;

    // Function to open the camera
    openCameraBtn.addEventListener('click', () => {
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(s => {
                stream = s;
                video.srcObject = stream;
                video.style.display = 'block';
                captureBtn.style.display = 'block';
                // delete class d-none in captureBtn
                captureBtn.classList.remove('d-none');
                openCameraBtn.style.display = 'none';
            })
            .catch(error => {
                console.error('Error accessing the webcam: ', error);
            });
    });

    // Capture the image from the video stream
    captureBtn.addEventListener('click', () => {
        const context = canvas.getContext('2d');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        const dataURL = canvas.toDataURL('image/png');
        webcamImage.value = dataURL;
        capturedImage.src = dataURL;
        capturedImage.style.display = 'block';

        // Stop the video stream
        stream.getTracks().forEach(track => track.stop());
        video.style.display = 'none';
        captureBtn.style.display = 'none';
        captureBtn.classList.add('d-none');
        alert('Image captured!');
    });
</script>
@endsection