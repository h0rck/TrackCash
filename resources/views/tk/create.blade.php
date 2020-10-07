@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex bg-dark p-0 dark">
                    <h3 class="card-title p-2">
                        <div class="pull-right">
                        <a class="btn btn-default" style="background:#D9461A; color: #fff;" href="{{route('home.index')}}"> Voltar</a>
                        </div>
                    </h3>
                </div>
                
                <div class="alert alert-success alert-dismissible d-none" id="success"></div>

                <form id="ajax_form">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="row">
                                            <input type="hidden" name="id_order" value="{{ $id }}" class="form-control">
                                            <input type="hidden" name="name" value= "API" class="form-control">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Ponto de venda</label>
                                            <div class="alert alert-success alert-dismissible d-none point_sale" id="messageBox"></div>
                                            <select class="form-control" name="point_sale" id="point_sale">
                                                <option selected></option>
                                                <option value="1">Amazon</option>
                                                <option value="2">Casas Bahia</option>
                                                <option value="3">Extra</option>
                                                <option value="4">Loja Virtual</option>
                                                <option value="5">Lojas Americanas</option>
                                                <option value="6">Magazine Luiza</option>
                                                <option value="7">Particular</option>
                                                <option value="8">Ponto Frio</option>
                                                <option value="9">Shoptime</option>
                                                <option value="10">Submarino</option>
                                                <option value="11">Walmart</option>
                                                <option value="12">Mercado Livre</option>
                                                <option value="13">Cnova</option>
                                                <option value="14">Carrefour</option>
                                                <option value="15">Netshoes</option>
                                                <option value="16">Zattini</option>
                                                <option value="17">Shoptimão</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="alert alert-success alert-dismissible d-none status" id="messageBox"></div>
                                            <select class="form-control" name="status" id="status">
                                                <option selected></option>
                                                <option value="1">Não Identificado</option>
                                                <option value="2">Aguardando Pagamento</option>
                                                <option value="3">Processando</option>
                                                <option value="4">Enviado</option>
                                                <option value="5">Entregue</option>
                                                <option value="6">Cancelado</option>
                                                <option value="7">Troca</option>
                                                <option value="8">Devolução</option>
                                                <option value="9">Não Relacionado</option>
                                                <option value="10">Pedido incompleto</option>
                                                <option value="11">A receber</option>
                                                <option value="12">Recebido</option>
                                                <option value="13">Chargeback</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Data </label>
                                            <div class="alert alert-success alert-dismissible d-none date" id="messageBox"></div>
                                            <input type="date" name="date" class="form-control" id="date">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Total do pedido  </label>
                                            <div class="alert alert-success alert-dismissible d-none total" id="messageBox"></div>
                                            <input type="text" name="total" class="form-control" id="total">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Total do produto</label>
                                            <div class="alert alert-success alert-dismissible d-none partial_total" id="messageBox"></div>
                                            <input type="text" name="partial_total" class="form-control" id="partial_total">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Total de frete</label>
                                            <div class="alert alert-success alert-dismissible d-none shipment_value" id="messageBox"></div>
                                            <input type="text" name="shipment_value" class="form-control" id="shipment_value">
                                        </div>
                                    </div>
                                            <input type="hidden" name="shipment" value = "B2W Entregas" class="form-control">
                                            <input type="hidden" name="invoice" value = "1574" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-default" style="background:#D9461A; color: #fff;">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script type="text/javascript">

	jQuery(document).ready(function(){
		jQuery('#ajax_form').submit(function(){
            var dados = jQuery( this ).serialize();

            if($("#point_sale").val() == ''){
                $(".point_sale").removeClass('d-none').html('* O campo Ponto de venda é obrigatório');
            }else{
                $(".point_sale").addClass('d-none');
            }
            if($("#status").val() == ''){
                $(".status").removeClass('d-none').html('* O campo Status é obrigatório');
            }else{
                $(".status").addClass('d-none');
            }
            if($("#date").val() == ''){
                $(".date").removeClass('d-none').html('* O campo Data é obrigatório');
            }else{
                $(".date").addClass('d-none');
            }
            if($("#total").val() == ''){
                $(".total").removeClass('d-none').html('* O campo Total do pedido é obrigatório');
            }else{
                $(".total").addClass('d-none');
            }
            if($("#partial_total").val() == ''){
                $(".partial_total").removeClass('d-none').html('* O campo Total do produto é obrigatório');
            }else{
                $(".partial_total").addClass('d-none');
            }
            if($("#shipment_value").val() == ''){
                $(".shipment_value").removeClass('d-none').html('* O campo Total de frete é obrigatório');
            }else{
                $(".shipment_value").addClass('d-none');
            }



			jQuery.ajax({
				type: "POST",
                url: "{{ route('home.store') }}",
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: dados,
                dataType: "JSON", 
				success: function(response)
				{
                    var error = response['0']['errors'];

                    console.log(error);
                    if(error == null){
					    $("#success").removeClass('d-none').html('Item salvo com sucesso');
                    }

				}
			});

            return false;
		});
	});
    </script>
    
    @endsection