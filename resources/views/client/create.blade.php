@extends('layouts.app')

@section('content')
   <div class="container">
     
      <!-- contenido aqui -->
    
        {!! Form::open(array('url' => '/client/store', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'clientForm')) !!}
        <div id="success_message"></div>
        <div class="form-group">
           {!! Form::label('nit','Nit',['class'=>'control-label col-sm-2'])!!}
           <div class="col-sm-5">
             {!! Form::text('nit',null,["class" => "form-control","id"=>"nit-name","placeholder"=>"Nit"])!!}
           </div>
           <div class="col-sm-5">
             {!! Form::button('Agregar', ['class' => 'btn btn-primary','id' => 'btn-formAdd']) !!}
           </div>
        </div>  

        <div class="form-group">
             {!! Form::label('nombrecompleto','Nombre completo',['class'=>'control-label col-sm-2'])!!}
             <div class="col-sm-5">
               {!! Form::text('nombrecompleto',null,["class" => "form-control","id"=>"nomcompleto-name","placeholder"=>"Nombre completo"])!!}
             </div>  
             <div class="col-sm-5">
               {!!Form::button('Add Visita',['class'=>'btn bnt-primary','data-toggle'=>'modal','data-target'=>'#modalVisita','id'=>'addVisita'])!!}
             </div>     
        </div>

        <div class="form-group">
              {!! Form::label('dirección','Dirección',['class'=>'control-label col-sm-2'])!!}
              <div class="col-sm-10">
                {!! Form::text('direccion',null,["class" => "form-control","id"=>"direccion-name","placeholder"=>"Direccion"])!!}
               </div>
        </div>

        <div class="form-group">
              {!! Form::label('telefono','Telefono',['class'=>'control-label col-sm-2'])!!}
              <div class="col-sm-10">
                {!! Form::text('telefono',null,["class" => "form-control","id"=>"telefono-name","placeholder"=>"telefono"])!!}
              </div>
        </div>

          
        <div class="form-group">      
              {!! Form::label('pais','País',['class'=>'control-label col-sm-2'])!!}
              <div class="col-sm-10">
                {!! Form::select('pais',$catCountries,null,["class"=>"form-control","id"=>"pais-name","placeholder"=>"Selecciona una opción"])!!}
              </div>
        </div>


        <div class="form-group">      
              {!! Form::label('departamento','Departamento',['class'=>'control-label col-sm-2'])!!}
              <div class="col-sm-10">
                {!! Form::select('departamento',$catDepartments,null,["class"=>"form-control","id"=>"departamento-name","placeholder"=>"Seleccione una opción"])!!}
              </div>
        </div>

        <div class="form-group">      
              {!! Form::label('ciudad','Ciudad',['class'=>'control-label col-sm-2'])!!}
              <div class="col-sm-10">
                {!! Form::select('ciudad',$catCities,null,["class"=>"form-control","id"=>"ciudad-name","placeholder"=>"Seleccione una opción"])!!}
              </div>
        </div>

        
        <div class="form-group">
              {!! Form::label('cupo','Cupo',['class'=>'control-label col-sm-2'])!!}
              <div class="col-sm-10">
                {!! Form::text('cupo',null,["class" => "form-control","id"=>"cupo-name","placeholder"=>"cupo"]) !!}
              </div>
        </div>

        <div class="form-group">
              {!! Form::label('porcentajevisitas','Porcentaje de visitas',['class'=>'control-label col-sm-2']) !!}
              <div class="col-sm-10">
                {!! Form::text('porcentajevisitas',null,["class" => "form-control","id"=>"porcentaje-name","placeholder"=>"Porcentaje de ventas"]) !!}
              </div>
        </div>

        <div class="form-group">
              {!! Form::label('saldocupo','Saldo cupo',['class'=>'control-label col-sm-2'])!!}
              <div class="col-sm-10">
                {!! Form::text('saldocupo',null,["class"=>"form-control","id"=>"saldocupo-name","placeholder"=>"Saldo cupo"])!!}
              </div>
        </div>
        {!! Form::close() !!}

        
        @include('partials.modalAddVisita')
        
  </div>
   
      @endsection
      @section('scripts')
          {!! Html::style('assets/datepicker/css/bootstrap-datepicker.css') !!}
          {!! Html::style('assets/datepicker/css/bootstrap-datepicker.standalone.css') !!}
          {!! Html::script('assets/datepicker/js/bootstrap-datepicker.js') !!}
          {!! Html::script('assets/datepicker/locales/bootstrap-datepicker.es.min.js') !!}

        <script type="text/javascript">
        
        $("select[name='pais']").change(function(){  
            var foreign_id  = $(this).val();
            var token = $("input[name='_token']").val();
            var select_name = "select[name='departamento']";
            var _data = {
                 foreign_id: foreign_id,
                 _token: token,
                 foreign_name: 'pais_id',
                 field: 'nomdepartamento',
                 class_name: 'Department'
             };

            ajaxSelect(select_name,_data);
         });

         $("select[name='departamento']").change(function()
         {
            var foreignKey = $(this).val();
            var token= $("input[name='_token']").val();
            var select_name = "select[name='ciudad']";
            var _data = {
                foreign_id: foreignKey,
                _token: token,
                foreign_name: 'departamento_id',
                field: 'nomciudad',
                class_name:'City'
             };
              ajaxSelect(select_name,_data);
         }); 

         function ajaxSelect(select_name,_data)
         {
             $.ajax({
              url:"{{route('select-ajax')}}",
              method:'POST',
              data:_data,
              success:function(data){
                $(select_name).html();
                $(select_name).html(data.options);
              }});
          }

          function printSuccessMessage(message)
          {
              $('#success_message').append(
                "<div id='myAlert' class='alert alert-success'>" +
                "<button type='button' class='close' data-dismiss='alert' aria-label='Close'"+
                "<span aria-hidden='true'>&times;</span></button>" +
                "<div id='message'>"+jQuery.parseJSON(message).message +"</div>" +                     
                "</div>"
               );

               $("#myAlert").delay(3000).fadeOut();
          }
         
          $("#btn-formAdd").click(function()
          {
              var Id = '#clientForm';
              
              $.ajax({
                  url:$(Id).attr('action'),
                  method:'POST',
                  data:$(Id).serialize(),
                  dataType:'html',
                  headers:{'X-CSRF-Token' : $('meta[name=_token]').attr('content')},
                  success:function(result){
                    printSuccessMessage(result);
                  }
              });

            });

            $('.datepicker').datepicker({
                format: "dd/mm/yyyy",
                language: "es",
                autoclose: true
            });
           
        </script>
      @endsection