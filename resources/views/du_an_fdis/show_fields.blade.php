<!-- Ten Field -->
<div class="form-group">
    {!! Form::label('ten', 'Tên dự án:') !!}
    <p>{{ $duAnFdi->ten }}</p>
</div>

<!-- Chu Dau Tu Field -->
<div class="form-group">
    {!! Form::label('chu_dau_tu', 'Chủ đầu tư:') !!}
    <p>{{ $duAnFdi->chu_dau_tu }}</p>
</div>

<!-- Noi Dung Field -->
<div class="form-group">
    {!! Form::label('noi_dung', 'Nội dung dự án:') !!}
    <p>{{ $duAnFdi->noi_dung }}</p>
</div>

<!-- Giai Ngan Field -->
<div class="form-group">
    {!! Form::label('giai_ngan', 'Tình hình giải ngân:') !!}
    <p>{{ $duAnFdi->giai_ngan }}</p>
</div>

<!-- Dia Ban Field -->
<div class="form-group">
    {!! Form::label('dia_ban', 'Địa bàn thực hiện:') !!}
    <p>{{ $duAnFdi->dia_ban }}</p>
</div>

<!-- Ket Qua Field -->
<div class="form-group">
    {!! Form::label('ket_qua', 'Tình hình kết quả thực hiện:') !!}
    <p>{{ $duAnFdi->ket_qua }}</p>
</div>
