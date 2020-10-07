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
                                    <input type="hidden" name="id_order" value = "{{ $return->id_order }}" class="form-control">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Origem </label>
                                            <input disabled value = "{{$return->name}}" class="form-control">
                                            <input  value ="{{$return->name}}" type="hidden" name="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Ponto de venda</label>
                                            <select class="form-control" name="point_sale">
                                                <option value="1" {{($return->point_sale == 'Amazon' ? 'selected' : false)}}>Amazon</option>
                                                <option value="2" {{($return->point_sale == 'Casas Bahia' ? 'selected' : false)}}>Casas Bahia</option>
                                                <option value="3" {{($return->point_sale == 'Extra' ? 'selected' : false)}}>Extra</option>
                                                <option value="4" {{($return->point_sale == 'Loja Virtual' ? 'selected' : false)}}>Loja Virtual</option>
                                                <option value="5" {{($return->point_sale == 'Lojas Americanas' ? 'selected' : false)}}>Lojas Americanas</option>
                                                <option value="6" {{($return->point_sale == 'Magazine Luiza' ? 'selected' : false)}}>Magazine Luiza</option>
                                                <option value="7" {{($return->point_sale == 'Particular' ? 'selected' : false)}}>Particular</option>
                                                <option value="8" {{($return->point_sale == 'Ponto Frio' ? 'selected' : false)}}>Ponto Frio</option>
                                                <option value="9" {{($return->point_sale == 'Shoptime' ? 'selected' : false)}}>Shoptime</option>
                                                <option value="10" {{($return->point_sale == 'Submarino' ? 'selected' : false)}}>Submarino</option>
                                                <option value="11" {{($return->point_sale == 'Walmart' ? 'selected' : false)}}>Walmart</option>
                                                <option value="12" {{($return->point_sale == 'Mercado Livre' ? 'selected' : false)}}>Mercado Livre</option>
                                                <option value="13" {{($return->point_sale == 'Cnova' ? 'selected' : false)}}>Cnova</option>
                                                <option value="14" {{($return->point_sale == 'Carrefour' ? 'selected' : false)}}>Carrefour</option>
                                                <option value="15" {{($return->point_sale == 'Netshoes' ? 'selected' : false)}}>Netshoes</option>
                                                <option value="16" {{($return->point_sale == 'Zattini' ? 'selected' : false)}}>Zattini</option>
                                                <option value="17" {{($return->point_sale == 'Shoptimão' ? 'selected' : false)}}>Shoptimão</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Status </label>
                                            <select class="form-control" name="status">
                                                <option value="1" {{($return->status == 'Não Identificado' ? 'selected' : false)}}>Não Identificado</option>
                                                <option value="2" {{($return->status == 'Aguardando Pagamento' ? 'selected' : false)}}>Aguardando Pagamento</option>
                                                <option value="3" {{($return->status == 'Processando' ? 'selected' : false)}}>Processando</option>
                                                <option value="4" {{($return->status == 'Enviado' ? 'selected' : false)}}>Enviado</option>
                                                <option value="5" {{($return->status == 'Entregue' ? 'selected' : false)}}>Entregue</option>
                                                <option value="6" {{($return->status == 'Cancelado' ? 'selected' : false)}}>Cancelado</option>
                                                <option value="7" {{($return->status == 'Troca' ? 'selected' : false)}}>Troca</option>
                                                <option value="8" {{($return->status == 'Devolução' ? 'selected' : false)}}>Devolução</option>
                                                <option value="9" {{($return->status == 'Não Relacionado' ? 'selected' : false)}}>Não Relacionado</option>
                                                <option value="10" {{($return->status == 'Pedido incompleto' ? 'selected' : false)}}>Pedido incompleto</option>
                                                <option value="11" {{($return->status == 'A receber' ? 'selected' : false)}}>A receber</option>
                                                <option value="12" {{($return->status == 'Recebido' ? 'selected' : false)}}>Recebido</option>
                                                <option value="13" {{($return->status == 'Chargeback' ? 'selected' : false)}}>Chargeback</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Data </label>
                                            <div class="alert alert-success alert-dismissible d-none date" id="messageBox"></div>
                                            <input value = "{{$return->date}}" type="date" name="date" class="form-control" id="date">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Total do pedido  </label>
                                            <div class="alert alert-success alert-dismissible d-none total" id="messageBox"></div>
                                            <input value = "{{$return->total}}" type="text" name="total" class="form-control" id="total">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Total do produto  </label>
                                            <div class="alert alert-success alert-dismissible d-none partial_total" id="messageBox"></div>
                                            <input value = "{{$return->partial_total}}" type="text" name="partial_total" class="form-control" id="partial_total">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Total de frete  </label>
                                            <div class="alert alert-success alert-dismissible d-none shipment_value" id="messageBox"></div>
                                            <input value = "{{$return->shipment_value}}" type="text" name="shipment_value" class="form-control" id="shipment_value">
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
            var dados = jQuery(this).serialize();

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
				type: "PUT",
                url: "{{ route('home.update',$return->id_order) }}",
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