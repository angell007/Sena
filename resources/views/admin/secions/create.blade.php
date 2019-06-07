@extends('laracrud::layouts.modal')

@section('title', 'Create Secion')
@section('content')

        <form method="POST" action="{{ route('admin.secions.create', $id ) }}" data-ajax-form>
            @csrf
        <div class="modal-body">
            <div class="form-group">
                    <label for="Docente" class="label label-control">Docente</label>
                    <select class="browser-default custom-select form-control" name="docente_id">
                        @foreach ($docentes as $item)
                        <option value="{{$item[0]->id}}" > {{$item[0]->name}} {{$item[0]->apellido}} </option>
                        @endforeach
                    </select>
            </div>

            <div class="form-group">
                    <label for="Asignatura" class="label label-control">Asignatura</label>
                    <select class="browser-default custom-select form-control" name="competencia_id">
                        @foreach ($competencias as $item)
                        <option value="{{$item[0]->id}}" > {{$item[0]->name}} </option>
                        @endforeach
                    </select>
            </div>

            <div class="form-group">
                    <label for="Ambientes" class="label label-control">Ambientes</label>
                    <select class="browser-default custom-select form-control" name="ambiente_id">
                        @foreach ($ambientes as $item)
                        <option value="{{$item->id}}" > {{$item->numero}} </option>
                        @endforeach
                    </select>
            </div>


            <div class="form-group">
                    <label for="Dia" class="label label-control">Dia</label>
                    <select class="browser-default custom-select form-control" name="dia">
                        <option selected  value="Lunes" > Lunes </option>
                        <option value="Martes">Martes</option>
                        <option value="Miercoles">Miercoles</option>
                        <option value="Jueves">Jueves</option>
                        <option value="Viernes">Viernes</option>
                        <option value="Sabado">Sabado</option>
                        <option value="Domingo">Domingo</option>
                    </select>
            </div>

            <div class="form-group">
                    <label for="Jornada" class="label label-control">Jornada</label>
                    <select class="browser-default custom-select form-control" name="jornada">
                        <option selected  value="Mañana" > Mañana </option>
                        <option value="Tarde">Tarde</option>
                        <option value="Noche">Noche</option>
                    </select>
            </div>

            <div class="form-group">
                    <label for="hora_inicio" class="label label-control">Hora de inicio </label>
                    <select class="browser-default custom-select form-control" name="hora_inicio">
                        <option selected  value="1" >1 :00  </option>
                        <option selected  value="2" >2 :00  </option>
                        <option selected  value="3" >3 :00  </option>
                        <option selected  value="4" >4 :00  </option>
                        <option selected  value="5" >5 :00  </option>
                        <option selected  value="6" >6 :00  </option>
                        <option selected  value="7" >7 :00  </option>
                        <option selected  value="8" >8 :00  </option>
                        <option selected  value="9" >9 :00  </option>
                        <option selected  value="10" >10 :00  </option>
                        <option selected  value="11" >11 :00  </option>
                        <option selected  value="12" >12 :00  </option>
                    </select>
                    <select class="browser-default custom-select form-control" name="him">
                            <option selected  value="Am" > Am </option>
                            <option selected  value="Pm" > Pm </option>
                    </select>
            </div>


            <div class="form-group">
                    <label for="hora_fin" class="label label-control">Hora de finalizacion </label>
                    <select class="browser-default custom-select form-control" name="hora_fin">
                        <option selected  value="1" >1 :00  </option>
                        <option selected  value="2" >2 :00  </option>
                        <option selected  value="3" >3:00  </option>
                        <option selected  value="4" >4 :00  </option>
                        <option selected  value="5" >5 :00  </option>
                        <option selected  value="6" >6 :00  </option>
                        <option selected  value="7" >7 :00  </option>
                        <option selected  value="8" >8 :00  </option>
                        <option selected  value="9" >9 :00  </option>
                        <option selected  value="10" >10 :00  </option>
                        <option selected  value="11" >11 :00  </option>
                        <option selected  value="12" >12 :00  </option>
                    </select>

                    <select class="browser-default custom-select form-control" name="hfm">
                            <option selected  value="Am" > Am </option>
                            <option selected  value="Pm" > Pm </option>
                    </select>
            </div>


                 {{-- <div class="form-group">
                    <label for="Intensidad horaria" class="label label-control">Intensidad horaria</label>
                    <input type="text" name="horas" id="horas" class="form-control" value="{{ old('horas') }}">
                </div> --}}

                <div class="form-group">
                        <input type="hidden" name="ficha_id" id="ficha_id" class="form-control" value="{{ old('ficha_id',$id) }}">
                </div>

            </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-primary">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection
