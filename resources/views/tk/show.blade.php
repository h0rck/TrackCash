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
                
                @include('layouts.flash')

                <form action="{{ route('home.update',$return->id_order) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="row">
                                    <input type="hidden" name="id_order" value = "{{ $return->id_order }}" class="form-control">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Origem </label>
                                            <input value = "{{$return->name}}" type="text" name="name" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Ponto de venda</label>
                                            <select class="form-control" name="point_sale" disabled>
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
                                            <select class="form-control" name="status" disabled>
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
                                            <input disabled value = "{{$return->date}}" type="date" name="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Total do pedido  </label>
                                            <input disabled value = "{{$return->total}}" type="text" name="total" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Total do produto  </label>
                                            <input disabled value = "{{$return->partial_total}}" type="text" name="partial_total" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Total de frete  </label>
                                            <input disabled value = "{{$return->shipment_value}}" type="text" name="shipment_value" class="form-control">
                                        </div>
                                    </div>
                                            <input disabled type="hidden" name="shipment" value = "B2W Entregas" class="form-control">
                                            <input disabled type="hidden" name="invoice" value = "1574" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection