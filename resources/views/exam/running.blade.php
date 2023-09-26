@extends('layouts.app')
@section('content')


<div class="row">
    <div class="col-sm-3">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Question Navigation</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body text-center" id="tampil_jawaban">
            </div>
        </div>
    </div>
    <div class="col-sm-9">
        <form action="http://localhost/ci_exam/ujian" id="ujian" method="post" accept-charset="utf-8">
            <input type="hidden" name="id" value="b9e68d94ef23a9986d94301ec75b5db62c04224d20fc0b13016e49385e34b33f3f467726c54af3f9ad6b17361dcbc6dbe2ec56be5c332eada2854cd3fd1abb09n+2moCowu8EkGU1AVz1c4CbTyivpFI6idIxc/lRCs+c=" />
            <input type="hidden" name="csrf_test_name" value="f507e8412b3a69ff657c1f4606c1e49b" />
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><span class="badge bg-blue">Question #<span id="soalke"></span> </span></h3>
                    <div class="box-tools pull-right">
                        <span class="badge bg-red">Remaining time <span class="sisawaktu"
                                data-time="2023-09-22 09:58:00"></span></span>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    @foreach ($questions as $question)
                    <input type="hidden" name="id_soal_{{ $question->id }}" value="{{ $question->id }}">
                    <input type="hidden" name="rg_{{ $question->id }}" id="rg_{{ $question->id }}" value="N">
                    <div class="step" id="widget_1">
                        <div class="text-center">
                            <div class="w-25"></div>
                        </div>
                        <p>{{ $question?->text }}<br></p>
                        <div class="funkyradio">
                            @foreach ($question->answers as $answer)
                            <div class="funkyradio-success" onclick="return simpan_sementara();">
                                <input type="radio" id="opsi_a_{{ $question->id }}" name="opsi_{{ $answer->id }}" value="{{ $answer->text }}">
                                <label for="opsi_a_{{ $question->id }}">
                                    <div class="huruf_opsi">{{ $loop->iteration }}</div>
                                    <p>
                                    <p>{{ $answer->text }}<br></p>
                                    </p>
                                    <div class="w-25"></div>
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="box-footer text-center">
                    <a class="action back btn btn-info" rel="0" onclick="return back();"><i
                            class="glyphicon glyphicon-chevron-left"></i> Back</a>
                    <a class="ragu_ragu btn btn-primary" rel="1" onclick="return tidak_jawab();">Doubtful</a>
                    <a class="action next btn btn-info" rel="2" onclick="return next();"><i
                            class="glyphicon glyphicon-chevron-right"></i> Next</a>
                    <a class="selesai action submit btn btn-danger" onclick="return simpan_akhir();"><i
                            class="glyphicon glyphicon-stop"></i> Finished</a>
                    <input type="hidden" name="jml_soal" id="jml_soal" value="2">
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    // var base_url        = "base_url();";
    // var id_tes          = "$id_tes;";
    // var widget          = $(".step");
    // var total_widget    = widget.length;
</script>

<script src="{{ asset('assets/dist/js/app/ujian/sheet.js') }}"></script>
@endsection
