@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.flash')
    <div class="row">
        <div class="col-12">
                        <table class="table table-hover">
                            <thead class="thead-dark table-sm">
                                    <tr>
                                        <th width="90px"><h3 class="p-1">
                                                <a class="btn btn-default" style="background:#D9461A; color: #fff;" href="{{ route('home.create') }}">Adicionar</a>
                                            </h3>
                                        </th>
                                            <th style="text-align: center;">ID</th>
                                            <th style="text-align: center;">Origem</th>
                                            <th style="text-align: center;" width="170px">Ponto de venda </th>
                                            <th style="text-align: center;" width="90px">Total do pedido</th>
                                            <th style="text-align: center;" width="90px">Total do produto</th>
                                            <th style="text-align: center;" width="90px" >Total de frete</th>
                                            <th style="text-align: center;">Status</th>
                                            <th style="text-align: center;" width="110px" >Data</th>
                                            <th style="text-align: center;"></th>
                                    </tr>
                            </thead>
                            <tbody>
                                @foreach ($returns as $return)
                                <tr style="text-align: center;">
                                    <td class="row"><a href="{{ route('home.edit',$return->id_order) }}" class="btn"><i><svg height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                      </svg></i></a>
                                      <a href="{{ route('home.show',$return->id_order) }}" class="btn"><i><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-binoculars-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.5 1A1.5 1.5 0 0 0 3 2.5V3h4v-.5A1.5 1.5 0 0 0 5.5 1h-1zM7 4v1h2V4h4v.882a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V13H9v-1.5a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5V13H1V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V4h4zM1 14v.5A1.5 1.5 0 0 0 2.5 16h3A1.5 1.5 0 0 0 7 14.5V14H1zm8 0v.5a1.5 1.5 0 0 0 1.5 1.5h3a1.5 1.5 0 0 0 1.5-1.5V14H9zm4-11H9v-.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5V3z"/>
                                      </svg></i></a>
                                    </td>
                                    <td>{{ $return->id_order }}</td>
                                    <td>{{ $return->name }}</td>
                                    <td>{{ $return->point_sale }}</td>
                                    <td>{{ $return->total }}</td>
                                    <td>{{ $return->partial_total }}</td>
                                    <td>{{ $return->shipment_value }}</td>
                                    <td>{{ $return->status }}</td>
                                    <td>{{ date('d/m/Y', strtotime($return->date)) }}</td>
                                    <td>
                                        <div class="row">
                                            <form action="{{ route('home.destroy',$return->id_order) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir?');">
                                                @csrf
                                                @method('DELETE')
    
                                                <button type="submit" class="btn">
                                                    <i><svg width="1em" height="1em" class="bi bi-trash-fill" fill="currentColor"">
                                                        <path style="color: red;" fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                                      </svg></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
