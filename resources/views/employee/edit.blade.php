@extends('layouts.app')
@section('content')

<h1>Update Data {{ $employee->name }}</h1>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body mb-1">
              <form action="{{ route('superadmin.employee.update', $employee->id) }}" method="POST">
                @csrf
                @method('patch')
                <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="name" class="form-label">Name</label>
                      <input
                        class="form-control @error('name') is-invalid @enderror"
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Name"
                        value="{{ $employee->name }}"
                        required
                      />
                      @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                  </div>
                  <div class="mb-3 col-md-6">
                      <label for="birthday_date" class="form-label">BirthDay Date</label>
                      <input class="form-control @error('birthday_date') is-invalid @enderror" type="date" name="birthday_date" id="birthday_date" value="{{ $employee->birthday_date }}"  required/>
                      @error('birthday_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="email" class="form-label">E-mail</label>
                      <input
                        class="form-control @error('email') is-invalid @enderror"
                        type="text"
                        id="email"
                        name="email"
                        placeholder="E-mail"
                        value="{{ $user->email }}"
                        required/>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="mb-3 col-md-6">
                      <label class="form-label" for="phone_number">Phone Number</label>
                      <div class="input-group input-group-merge">
                        <input
                          type="number"
                          id="phone_number"
                          name="phone_number"
                          class="form-control @error('phone_number') is-invalid @enderror"
                          placeholder="Phone Number"
                          value="{{ $employee->phone_number }}"
                          required/>
                          @error('phone_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="address" class="form-label">Address</label>
                      <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" value="{{ $employee->address }}" name="address" placeholder="Address"  required/>
                      @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="mb-3 col-md-6">
                      <label for="bank_number" class="form-label">Bank number</label>
                      <input class="form-control @error('bank_number') is-invalid @enderror" type="text" value="{{ $employee->bank_number }}" id="bank_number" name="bank_number" placeholder="bank number"  required/>
                      @error('bank_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="bank" class="form-label">Bank</label>
                      {{-- <input class="form-control @error('bank') is-invalid @enderror" type="text" id="bank" value="{{ $employee->bank }}" name="bank" placeholder="Bank"  required/> --}}
                      <select name="bank" class="select2 form-select @error('bank') is-invalid @enderror" type="text" id="bank" placeholder="Bank" required>
                        <option value="BANK BRI" {{ $employee->bank == 'BANK BRI' ? 'selected' : '' }}>BANK BRI</option>
                        <option value="BANK EKSPOR INDONESIA" {{ $employee->bank == 'BANK EKSPOR INDONESIA' ? 'selected' : '' }}>BANK EKSPOR INDONESIA</option>
                        <option value="BANK MANDIRI" {{ $employee->bank == 'BANK MANDIRI' ? 'selected' : '' }}>BANK MANDIRI</option>
                        <option value="BANK BNI" {{ $employee->bank == 'BANK BNI' ? 'selected' : '' }}>BANK BNI</option>
                        <option value="BANK DANAMON" {{ $employee->bank == 'BANK DANAMON' ? 'selected' : '' }}>BANK DANAMON</option>
                        <option value="PERMATA BANK" {{ $employee->bank == 'PERMATA BANK' ? 'selected' : '' }}>PERMATA BANK</option>
                        <option value="BANK BCA" {{ $employee->bank == 'BANK BCA' ? 'selected' : '' }}>BANK BCA</option>
                        <option value="BANK BII" {{ $employee->bank == 'BANK BII' ? 'selected' : '' }}>BANK BII</option>
                        <option value="BANK PANIN" {{ $employee->bank == 'BANK PANIN' ? 'selected' : '' }}>BANK PANIN</option>
                        <option value="BANK ARTA NIAGA KENCANA" {{ $employee->bank == 'BANK ARTA NIAGA KENCANA' ? 'selected' : '' }}>BANK ARTA NIAGA KENCANA</option>
                        <option value="BANK NIAGA" {{ $employee->bank == 'BANK NIAGA' ? 'selected' : '' }}>BANK NIAGA</option>
                        <option value="BANK BUANA IND" {{ $employee->bank == 'BANK BUANA IND' ? 'selected' : '' }}>BANK BUANA IND</option>
                        <option value="BANK LIPPO" {{ $employee->bank == 'BANK LIPPO' ? 'selected' : '' }}>BANK LIPPO</option>
                        <option value="BANK NISP" {{ $employee->bank == 'BANK NISP' ? 'selected' : '' }}>BANK NISP</option>
                        <option value="AMERICAN EXPRESS BANK LTD" {{ $employee->bank == 'AMERICAN EXPRESS BANK LTD' ? 'selected' : '' }}>AMERICAN EXPRESS BANK LTD</option>
                        <option value="CITIBANK N.A." {{ $employee->bank == 'CITIBANK N.A.' ? 'selected' : '' }}>CITIBANK N.A.</option>
                        <option value="JP. MORGAN CHASE BANK, N.A." {{ $employee->bank == 'JP. MORGAN CHASE BANK, N.A.' ? 'selected' : '' }}>JP. MORGAN CHASE BANK, N.A.</option>
                        <option value="BANK OF AMERICA, N.A" {{ $employee->bank == 'BANK OF AMERICA, N.A' ? 'selected' : '' }}>BANK OF AMERICA, N.A</option>
                        <option value="ING INDONESIA BANK" {{ $employee->bank == 'ING INDONESIA BANK' ? 'selected' : '' }}>ING INDONESIA BANK</option>
                        <option value="BANK MULTICOR TBK." {{ $employee->bank == 'BANK MULTICOR TBK.' ? 'selected' : '' }}>BANK MULTICOR TBK.</option>
                        <option value="BANK ARTHA GRAHA" {{ $employee->bank == 'BANK ARTHA GRAHA' ? 'selected' : '' }}>BANK ARTHA GRAHA</option>
                        <option value="BANK CREDIT AGRICOLE INDOSUEZ" {{ $employee->bank == 'BANK CREDIT AGRICOLE INDOSUEZ' ? 'selected' : '' }}>BANK CREDIT AGRICOLE INDOSUEZ</option>
                        <option value="THE BANGKOK BANK COMP. LTD" {{ $employee->bank == 'THE BANGKOK BANK COMP. LTD' ? 'selected' : '' }}>THE BANGKOK BANK COMP. LTD</option>
                        <option value="THE HONGKONG & SHANGHAI B.C." {{ $employee->bank == 'THE HONGKONG & SHANGHAI B.C.' ? 'selected' : '' }}>THE HONGKONG & SHANGHAI B.C.</option>
                        <option value="THE BANK OF TOKYO MITSUBISHI UFJ LTD" {{ $employee->bank == 'THE BANK OF TOKYO MITSUBISHI UFJ LTD' ? 'selected' : '' }}>THE BANK OF TOKYO MITSUBISHI UFJ LTD</option>
                        <option value="BANK SUMITOMO MITSUI INDONESIA" {{ $employee->bank == 'BANK SUMITOMO MITSUI INDONESIA' ? 'selected' : '' }}>BANK SUMITOMO MITSUI INDONESIA</option>
                        <option value="BANK DBS INDONESIA" {{ $employee->bank == 'BANK DBS INDONESIA' ? 'selected' : '' }}>BANK DBS INDONESIA</option>
                        <option value="BANK RESONA PERDANIA" {{ $employee->bank == 'BANK RESONA PERDANIA' ? 'selected' : '' }}>BANK RESONA PERDANIA</option>
                        <option value="BANK MIZUHO INDONESIA" {{ $employee->bank == 'BANK MIZUHO INDONESIA' ? 'selected' : '' }}>BANK MIZUHO INDONESIA</option>
                        <option value="STANDARD CHARTERED BANK" {{ $employee->bank == 'STANDARD CHARTERED BANK' ? 'selected' : '' }}>STANDARD CHARTERED BANK</option>
                        <option value="BANK ABN AMRO" {{ $employee->bank == 'BANK ABN AMRO' ? 'selected' : '' }}>BANK ABN AMRO</option>
                        <option value="BANK KEPPEL TATLEE BUANA" {{ $employee->bank == 'BANK KEPPEL TATLEE BUANA' ? 'selected' : '' }}>BANK KEPPEL TATLEE BUANA</option>
                        <option value="BANK CAPITAL INDONESIA, TBK." {{ $employee->bank == 'BANK CAPITAL INDONESIA, TBK.' ? 'selected' : '' }}>BANK CAPITAL INDONESIA, TBK.</option>
                        <option value="BANK BNP PARIBAS INDONESIA" {{ $employee->bank == 'BANK BNP PARIBAS INDONESIA' ? 'selected' : '' }}>BANK BNP PARIBAS INDONESIA</option>
                        <option value="BANK UOB INDONESIA" {{ $employee->bank == 'BANK UOB INDONESIA' ? 'selected' : '' }}>BANK UOB INDONESIA</option>
                        <option value="KOREA EXCHANGE BANK DANAMON" {{ $employee->bank == 'KOREA EXCHANGE BANK DANAMON' ? 'selected' : '' }}>KOREA EXCHANGE BANK DANAMON</option>
                        <option value="RABOBANK INTERNASIONAL INDONESIA" {{ $employee->bank == 'RABOBANK INTERNASIONAL INDONESIA' ? 'selected' : '' }}>RABOBANK INTERNASIONAL INDONESIA</option>
                        <option value="ANZ PANIN BANK" {{ $employee->bank == 'ANZ PANIN BANK' ? 'selected' : '' }}>ANZ PANIN BANK</option>
                        <option value="DEUTSCHE BANK AG." {{ $employee->bank == 'DEUTSCHE BANK AG.' ? 'selected' : '' }}>DEUTSCHE BANK AG.</option>
                        <option value="BANK WOORI INDONESIA" {{ $employee->bank == 'BANK WOORI INDONESIA' ? 'selected' : '' }}>BANK WOORI INDONESIA</option>
                        <option value="BANK OF CHINA LIMITED" {{ $employee->bank == 'BANK OF CHINA LIMITED' ? 'selected' : '' }}>BANK OF CHINA LIMITED</option>
                        <option value="BANK BUMI ARTA" {{ $employee->bank == 'BANK BUMI ARTA' ? 'selected' : '' }}>BANK BUMI ARTA</option>
                        <option value="BANK EKONOMI" {{ $employee->bank == 'BANK EKONOMI' ? 'selected' : '' }}>BANK EKONOMI</option>
                        <option value="BANK ANTARDAERAH" {{ $employee->bank == 'BANK ANTARDAERAH' ? 'selected' : '' }}>BANK ANTARDAERAH</option>
                        <option value="BANK HAGA" {{ $employee->bank == 'BANK HAGA' ? 'selected' : '' }}>BANK HAGA</option>
                        <option value="BANK IFI" {{ $employee->bank == 'BANK IFI' ? 'selected' : '' }}>BANK IFI</option>
                        <option value="BANK CENTURY, TBK." {{ $employee->bank == 'BANK CENTURY, TBK.' ? 'selected' : '' }}>BANK CENTURY, TBK.</option>
                        <option value="BANK MAYAPADA" {{ $employee->bank == 'BANK MAYAPADA' ? 'selected' : '' }}>BANK MAYAPADA</option>
                        <option value="BANK JABAR" {{ $employee->bank == 'BANK JABAR' ? 'selected' : '' }}>BANK JABAR</option>
                        <option value="BANK DKI" {{ $employee->bank == 'BANK DKI' ? 'selected' : '' }}>BANK DKI</option>
                        <option value="BPD DIY" {{ $employee->bank == 'BPD DIY' ? 'selected' : '' }}>BPD DIY</option>
                        <option value="BANK JATENG" {{ $employee->bank == 'BANK JATENG' ? 'selected' : '' }}>BANK JATENG</option>
                        <option value="BANK JATIM" {{ $employee->bank == 'BANK JATIM' ? 'selected' : '' }}>BANK JATIM</option>
                        <option value="BPD JAMBI" {{ $employee->bank == 'BPD JAMBI' ? 'selected' : '' }}>BPD JAMBI</option>
                        <option value="BPD ACEH" {{ $employee->bank == 'BPD ACEH' ? 'selected' : '' }}>BPD ACEH</option>
                        <option value="BANK SUMUT" {{ $employee->bank == 'BANK SUMUT' ? 'selected' : '' }}>BANK SUMUT</option>
                        <option value="BANK NAGARI" {{ $employee->bank == 'BANK NAGARI' ? 'selected' : '' }}>BANK NAGARI</option>
                        <option value="BANK RIAU" {{ $employee->bank == 'BANK RIAU' ? 'selected' : '' }}>BANK RIAU</option>
                        <option value="BANK SUMSEL" {{ $employee->bank == 'BANK SUMSEL' ? 'selected' : '' }}>BANK SUMSEL</option>
                        <option value="BANK LAMPUNG" {{ $employee->bank == 'BANK LAMPUNG' ? 'selected' : '' }}>BANK LAMPUNG</option>
                        <option value="BPD KALSEL" {{ $employee->bank == 'BPD KALSEL' ? 'selected' : '' }}>BPD KALSEL</option>
                        <option value="BPD KALIMANTAN BARAT" {{ $employee->bank == 'BPD KALIMANTAN BARAT' ? 'selected' : '' }}>BPD KALIMANTAN BARAT</option>
                        <option value="BPD KALTIM" {{ $employee->bank == 'BPD KALTIM' ? 'selected' : '' }}>BPD KALTIM</option>
                        <option value="BPD KALTENG" {{ $employee->bank == 'BPD KALTENG' ? 'selected' : '' }}>BPD KALTENG</option>
                        <option value="BPD SULSEL" {{ $employee->bank == 'BPD SULSEL' ? 'selected' : '' }}>BPD SULSEL</option>
                        <option value="BANK SULUT" {{ $employee->bank == 'BANK SULUT' ? 'selected' : '' }}>BANK SULUT</option>
                        <option value="BPD NTB" {{ $employee->bank == 'BPD NTB' ? 'selected' : '' }}>BPD NTB</option>
                        <option value="BPD BALI" {{ $employee->bank == 'BPD BALI' ? 'selected' : '' }}>BPD BALI</option>
                        <option value="BANK NTT" {{ $employee->bank == 'BANK NTT' ? 'selected' : '' }}>BANK NTT</option>
                        <option value="BANK MALUKU" {{ $employee->bank == 'BANK MALUKU' ? 'selected' : '' }}>BANK MALUKU</option>
                        <option value="BPD PAPUA" {{ $employee->bank == 'BPD PAPUA' ? 'selected' : '' }}>BPD PAPUA</option>
                        <option value="BANK BENGKULU" {{ $employee->bank == 'BANK BENGKULU' ? 'selected' : '' }}>BANK BENGKULU</option>
                        <option value="BPD SULAWESI TENGAH" {{ $employee->bank == 'BPD SULAWESI TENGAH' ? 'selected' : '' }}>BPD SULAWESI TENGAH</option>
                        <option value="BANK SULTRA" {{ $employee->bank == 'BANK SULTRA' ? 'selected' : '' }}>BANK SULTRA</option>
                        <option value="BANK NUSANTARA PARAHYANGAN" {{ $employee->bank == 'BANK NUSANTARA PARAHYANGAN' ? 'selected' : '' }}>BANK NUSANTARA PARAHYANGAN</option>
                        <option value="BANK SWADESI" {{ $employee->bank == 'BANK SWADESI' ? 'selected' : '' }}>BANK SWADESI</option>
                        <option value="BANK MUAMALAT" {{ $employee->bank == 'BANK MUAMALAT' ? 'selected' : '' }}>BANK MUAMALAT</option>
                        <option value="BANK MESTIKA" {{ $employee->bank == 'BANK MESTIKA' ? 'selected' : '' }}>BANK MESTIKA</option>
                        <option value="BANK METRO EXPRESS" {{ $employee->bank == 'BANK METRO EXPRESS' ? 'selected' : '' }}>BANK METRO EXPRESS</option>
                        <option value="BANK SHINTA INDONESIA" {{ $employee->bank == 'BANK SHINTA INDONESIA' ? 'selected' : '' }}>BANK SHINTA INDONESIA</option>
                        <option value="BANK MASPION" {{ $employee->bank == 'BANK MASPION' ? 'selected' : '' }}>BANK MASPION</option>
                        <option value="BANK HAGAKITA" {{ $employee->bank == 'BANK HAGAKITA' ? 'selected' : '' }}>BANK HAGAKITA</option>
                        <option value="BANK GANESHA" {{ $employee->bank == 'BANK GANESHA' ? 'selected' : '' }}>BANK GANESHA</option>
                        <option value="BANK WINDU KENTJANA" {{ $employee->bank == 'BANK WINDU KENTJANA' ? 'selected' : '' }}>BANK WINDU KENTJANA</option>
                        <option value="HALIM INDONESIA BANK" {{ $employee->bank == 'HALIM INDONESIA BANK' ? 'selected' : '' }}>HALIM INDONESIA BANK</option>
                        <option value="BANK HARMONI INTERNATIONAL" {{ $employee->bank == 'BANK HARMONI INTERNATIONAL' ? 'selected' : '' }}>BANK HARMONI INTERNATIONAL</option>
                        <option value="BANK KESAWAN" {{ $employee->bank == 'BANK KESAWAN' ? 'selected' : '' }}>BANK KESAWAN</option>
                        <option value="BANK TABUNGAN NEGARA (PERSERO)" {{ $employee->bank == 'BANK TABUNGAN NEGARA (PERSERO)' ? 'selected' : '' }}>BANK TABUNGAN NEGARA (PERSERO)</option>
                        <option value="BANK HIMPUNAN SAUDARA 1906, TBK." {{ $employee->bank == 'BANK HIMPUNAN SAUDARA 1906, TBK.' ? 'selected' : '' }}>BANK HIMPUNAN SAUDARA 1906, TBK.</option>
                        <option value="BANK TABUNGAN PENSIUNAN NASIONAL" {{ $employee->bank == 'BANK TABUNGAN PENSIUNAN NASIONAL' ? 'selected' : '' }}>BANK TABUNGAN PENSIUNAN NASIONAL</option>
                        <option value="BANK SWAGUNA" {{ $employee->bank == 'BANK SWAGUNA' ? 'selected' : '' }}>BANK SWAGUNA</option>
                        <option value="BANK JASA ARTA" {{ $employee->bank == 'BANK JASA ARTA' ? 'selected' : '' }}>BANK JASA ARTA</option>
                        <option value="BANK MEGA" {{ $employee->bank == 'BANK MEGA' ? 'selected' : '' }}>BANK MEGA</option>
                        <option value="BANK JASA JAKARTA" {{ $employee->bank == 'BANK JASA JAKARTA' ? 'selected' : '' }}>BANK JASA JAKARTA</option>
                        <option value="BANK BUKOPIN" {{ $employee->bank == 'BANK BUKOPIN' ? 'selected' : '' }}>BANK BUKOPIN</option>
                        <option value="BANK SYARIAH MANDIRI" {{ $employee->bank == 'BANK SYARIAH MANDIRI' ? 'selected' : '' }}>BANK SYARIAH MANDIRI</option>
                        <option value="BANK BISNIS INTERNASIONAL" {{ $employee->bank == 'BANK BISNIS INTERNASIONAL' ? 'selected' : '' }}>BANK BISNIS INTERNASIONAL</option>
                        <option value="BANK SRI PARTHA" {{ $employee->bank == 'BANK SRI PARTHA' ? 'selected' : '' }}>BANK SRI PARTHA</option>
                        <option value="BANK BINTANG MANUNGGAL" {{ $employee->bank == 'BANK BINTANG MANUNGGAL' ? 'selected' : '' }}>BANK BINTANG MANUNGGAL</option>
                        <option value="BANK BUMIPUTERA" {{ $employee->bank == 'BANK BUMIPUTERA' ? 'selected' : '' }}>BANK BUMIPUTERA</option>
                        <option value="BANK YUDHA BHAKTI" {{ $employee->bank == 'BANK YUDHA BHAKTI' ? 'selected' : '' }}>BANK YUDHA BHAKTI</option>
                        <option value="BANK MITRANIAGA" {{ $employee->bank == 'BANK MITRANIAGA' ? 'selected' : '' }}>BANK MITRANIAGA</option>
                        <option value="BANK AGRO NIAGA" {{ $employee->bank == 'BANK AGRO NIAGA' ? 'selected' : '' }}>BANK AGRO NIAGA</option>
                        <option value="BANK INDOMONEX" {{ $employee->bank == 'BANK INDOMONEX' ? 'selected' : '' }}>BANK INDOMONEX</option>
                        <option value="BANK ROYAL INDONESIA" {{ $employee->bank == 'BANK ROYAL INDONESIA' ? 'selected' : '' }}>BANK ROYAL INDONESIA</option>
                        <option value="BANK ALFINDO" {{ $employee->bank == 'BANK ALFINDO' ? 'selected' : '' }}>BANK ALFINDO</option>
                        <option value="BANK SYARIAH MEGA" {{ $employee->bank == 'BANK SYARIAH MEGA' ? 'selected' : '' }}>BANK SYARIAH MEGA</option>
                        <option value="BANK INA PERDANA" {{ $employee->bank == 'BANK INA PERDANA' ? 'selected' : '' }}>BANK INA PERDANA</option>
                        <option value="BANK HARFA" {{ $employee->bank == 'BANK HARFA' ? 'selected' : '' }}>BANK HARFA</option>
                        <option value="PRIMA MASTER BANK" {{ $employee->bank == 'PRIMA MASTER BANK' ? 'selected' : '' }}>PRIMA MASTER BANK</option>
                        <option value="BANK PERSYARIKATAN INDONESIA" {{ $employee->bank == 'BANK PERSYARIKATAN INDONESIA' ? 'selected' : '' }}>BANK PERSYARIKATAN INDONESIA</option>
                        <option value="BANK AKITA" {{ $employee->bank == 'BANK AKITA' ? 'selected' : '' }}>BANK AKITA</option>
                        <option value="LIMAN INTERNATIONAL BANK" {{ $employee->bank == 'LIMAN INTERNATIONAL BANK' ? 'selected' : '' }}>LIMAN INTERNATIONAL BANK</option>
                        <option value="ANGLOMAS INTERNASIONAL BANK" {{ $employee->bank == 'ANGLOMAS INTERNASIONAL BANK' ? 'selected' : '' }}>ANGLOMAS INTERNASIONAL BANK</option>
                        <option value="BANK DIPO INTERNATIONAL" {{ $employee->bank == 'BANK DIPO INTERNATIONAL' ? 'selected' : '' }}>BANK DIPO INTERNATIONAL</option>
                        <option value="BANK KESEJAHTERAAN EKONOMI" {{ $employee->bank == 'BANK KESEJAHTERAAN EKONOMI' ? 'selected' : '' }}>BANK KESEJAHTERAAN EKONOMI</option>
                        <option value="BANK UIB" {{ $employee->bank == 'BANK UIB' ? 'selected' : '' }}>BANK UIB</option>
                        <option value="BANK ARTOS IND" {{ $employee->bank == 'BANK ARTOS IND' ? 'selected' : '' }}>BANK ARTOS IND</option>
                        <option value="BANK PURBA DANARTA" {{ $employee->bank == 'BANK PURBA DANARTA' ? 'selected' : '' }}>BANK PURBA DANARTA</option>
                        <option value="BANK MULTI ARTA SENTOSA" {{ $employee->bank == 'BANK MULTI ARTA SENTOSA' ? 'selected' : '' }}>BANK MULTI ARTA SENTOSA</option>
                        <option value="BANK MAYORA" {{ $employee->bank == 'BANK MAYORA' ? 'selected' : '' }}>BANK MAYORA</option>
                        <option value="BANK INDEX SELINDO" {{ $employee->bank == 'BANK INDEX SELINDO' ? 'selected' : '' }}>BANK INDEX SELINDO</option>
                        <option value="BANK VICTORIA INTERNATIONAL" {{ $employee->bank == 'BANK VICTORIA INTERNATIONAL' ? 'selected' : '' }}>BANK VICTORIA INTERNATIONAL</option>
                        <option value="BANK EKSEKUTIF" {{ $employee->bank == 'BANK EKSEKUTIF' ? 'selected' : '' }}>BANK EKSEKUTIF</option>
                        <option value="CENTRATAMA NASIONAL BANK" {{ $employee->bank == 'CENTRATAMA NASIONAL BANK' ? 'selected' : '' }}>CENTRATAMA NASIONAL BANK</option>
                        <option value="BANK FAMA INTERNASIONAL" {{ $employee->bank == 'BANK FAMA INTERNASIONAL' ? 'selected' : '' }}>BANK FAMA INTERNASIONAL</option>
                        <option value="BANK SINAR HARAPAN BALI" {{ $employee->bank == 'BANK SINAR HARAPAN BALI' ? 'selected' : '' }}>BANK SINAR HARAPAN BALI</option>
                        <option value="BANK HARDA" {{ $employee->bank == 'BANK HARDA' ? 'selected' : '' }}>BANK HARDA</option>
                        <option value="BANK FINCONESIA" {{ $employee->bank == 'BANK FINCONESIA' ? 'selected' : '' }}>BANK FINCONESIA</option>
                        <option value="BANK MERINCORP" {{ $employee->bank == 'BANK MERINCORP' ? 'selected' : '' }}>BANK MERINCORP</option>
                        <option value="BANK MAYBANK INDOCORP" {{ $employee->bank == 'BANK MAYBANK INDOCORP' ? 'selected' : '' }}>BANK MAYBANK INDOCORP</option>
                        <option value="BANK OCBC – INDONESIA" {{ $employee->bank == 'BANK OCBC – INDONESIA' ? 'selected' : '' }}>BANK OCBC – INDONESIA</option>
                        <option value="BANK CHINA TRUST INDONESIA" {{ $employee->bank == 'BANK CHINA TRUST INDONESIA' ? 'selected' : '' }}>BANK CHINA TRUST INDONESIA</option>
                        <option value="BANK COMMONWEALTH" {{ $employee->bank == 'BANK COMMONWEALTH' ? 'selected' : '' }}>BANK COMMONWEALTH</option>
                        <option value="BANK BJB SYARIAH" {{ $employee->bank == 'BANK BJB SYARIAH' ? 'selected' : '' }}>BANK BJB SYARIAH</option>
                        <option value="BPR KS (KARYAJATNIKA SEDAYA)" {{ $employee->bank == 'BPR KS (KARYAJATNIKA SEDAYA)' ? 'selected' : '' }}>BPR KS (KARYAJATNIKA SEDAYA)</option>
                        <option value="INDOSAT DOMPETKU" {{ $employee->bank == 'INDOSAT DOMPETKU' ? 'selected' : '' }}>INDOSAT DOMPETKU</option>
                        <option value="TELKOMSEL TCASH" {{ $employee->bank == 'TELKOMSEL TCASH' ? 'selected' : '' }}>TELKOMSEL TCASH</option>
                        <option value="LINKAJA" {{ $employee->bank == 'LINKAJA' ? 'selected' : '' }}>LINKAJA</option>
                      </select>
                      
                      @error('bank')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="mb-3 col-md-6">
                      <label class="form-label" for="blood">Blood</label>
                      <select id="blood" class="select2 form-select @error('blood') is-invalid @enderror" name="blood" required>
                        <option value="">Blood Type</option>
                        <option value="A" {{ $employee->blood == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ $employee->blood == 'B' ? 'selected' : '' }}>B</option>
                        <option value="AB" {{ $employee->blood == 'AB' ? 'selected' : '' }}>AB</option>
                        <option value="O" {{ $employee->blood == 'O' ? 'selected' : '' }}>O</option>
                      </select>
                      @error('blood')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col-md-6">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input class="form-control @error('start_date') is-invalid @enderror" type="date" id="start_date" value="{{ $employee->start_date }}" name="start_date" placeholder="California"   required/>
                          @error('start_date')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                  </div>
                  <div class="mb-3 col-md-6">
                        <label for="end_date" class="form-label">End Date</label>
                        <input class="form-control @error('end_date') is-invalid @enderror" type="date" id="end_date" name="end_date" value="{{ $employee->end_date }}" placeholder="California"  required/>
                          @error('end_date')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col-md-6">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" class="select2 form-select @error('status') is-invalid @enderror" name="status" required>
                          <option value="">status</option>
                          <option value="Active" {{ $employee->status == 'Active' ? 'selected' : '' }}>Active</option>
                          <option value="InActive" {{ $employee->status == 'InActive' ? 'selected' : '' }}>InActive</option>
                      </select>
                      @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="mb-3 col-md-6">
                        <label for="gender" class="form-label">Gender</label>
                        <select id="gender" class="select2 form-select @error('gender') is-invalid @enderror" name="gender" required>
                          <option value="">Gender</option>
                          <option value="L" {{ $employee->gender == 'L' ? 'selected' : '' }}>L</option>
                          <option value="P"{{ $employee->gender == 'P' ? 'selected' : '' }} >P</option>
                      </select> 
                      @error('gender')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
                  
                </div>
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="department" class="form-label">Department</label>
                    <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" placeholder="Department" value={{$employee->department}}  required/>
                    @error('department')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="Salary" class="form-label">Salary</label>
                    <input type="text" class="form-control @error('Salary') is-invalid @enderror" id="Salary" name="Salary" placeholder="Salary" value={{$employee->Salary}}  required/>
                    @error('Salary')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                
                </div>
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="role" class="form-label">Role</label>
                    <select id="role" class="select2 form-select @error('role') is-invalid @enderror" name="role" required>
                      {{-- <option value="" disabled selected>Select Role</option> --}}
                      @foreach ($roles as $role)
                          <option value="{{ $role->name }}"{{ $user->getRoleNames()[0] == $role->name? 'selected' : '' }}>{{ $role->name }}</option>
                      @endforeach
                    </select> 
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="">
                  <label for="id" class="form-label"></label>
                  <input class="form-control" type="text" id="id" name="id" placeholder="California" hidden value="{{ $employee->id }}"/>
                </div>
                <div class="">
                  <label for="user_id" class="form-label"></label>
                  <input class="form-control" type="text" id="user_id" name="user_id" placeholder="California" hidden value="{{ $employee->user_id }}" />
                </div>
                <div class="mb-3 ms-4 col-md-6">
                  <button type="submit" class="btn btn-primary me-2">Save changes</button>
                  <button type="reset" class="btn btn-label-secondary">Cancel</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>




@endsection