<div id="modalVisita" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Adicionar Visitas</h4>
            </div>

            <div class="modal-body">
               <div class="form-group">
                  {!! Form::open(['url'=>'visita/store','method'=>'POST','class'=>'form-horizontal','id'=>'visitaForm']) !!}
                  {!! Form::label('fecha','Fecha')!!}
                  {!! Form::text('fecha',null, ['class'=>'form-control datepicker','id'=>'fecha-name','placeholder'=>'Fecha']) !!}  
               </div>

               <div class="form-group">
                  {!! Form::label('vendedor','Vendedor') !!}
                  {!! Form::select('vendedor',$catSellers,null,['class'=>'form-control','id'=>'vendedor-name','placeholder'=>'Seleccione']) !!} 
               </div>

               <div class="form-group">
                  {!! Form::label('vrneto','Valor neto') !!}
                  {!! Form::text('vrneto',null,['class'=>'form-control','id'=>'vrneto-name','placeholder'=>'Valor neto']) !!}         
               </div>

               <div class="form-group">
                 {!! Form::label('valorvisita','Valor visita') !!}          
                 {!! Form::text('valorvisita',null, ['class'=>'form-control','id'=>'valorvisita-name','placeholder'=>'Valor visita']) !!}
               </div>

               <div class="form-group">
                 {!! Form::label('observaciones','Observaciones') !!}
                 {!! Form::textarea('observaciones',null, ['class'=>'form-control','id'=>'observaciones-name','placeholder'=>'Observaciones']) !!}
               </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            
        </div>
    </div>
</div>