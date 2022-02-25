@extends('body.pageAfterAuth')
@section('styleHead')
    @parent
    <link rel="stylesheet" href="{{ asset('table/style.css') }}">
@endsection
@section('scriptHead')
    @parent
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            $(document).ready(function() {
                // Activate tooltip
                $(function() {
                    $('[data-toggle="tooltip"]').tooltip()
                })
            });

            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function() {
                if (this.checked) {
                    checkbox.each(function() {
                        this.checked = true;
                    });
                } else {
                    checkbox.each(function() {
                        this.checked = false;
                    });
                }
            });

            checkbox.click(function() {
                if (!this.checked) {
                    $("#selectAll").prop("checked", false);
                }
            });
        });
    </script>
@endsection
@section('bodyAfterAuth')
    <main class="col-md-9 ms-sm-auto col-lg-10">
        <div class="table-responsive">
            <div class="table-wrapper">

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Product</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group col-xs-6">
                            <table>
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                            data-bs-target="#formProduct" data-bs-whatever="@mdo">Adicionar produto</button>
                                    </td>
                                    <td> <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#purgeProduct" data-bs-whatever="@mdo">Excluir</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover" id="table-itens">
                    <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th scope="col">Name</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Update</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                            <tr>
                                <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox{{ $key }}" name="options[]" value="1">
                                        <label for="checkbox{{ $key }}"></label>
                                    </span>
                                </td>
                                <td>{{ $product['name'] }}</td>
                                <td>{{ implode(array_values($product['tags']), ', ') }}</td>
                                <td>{{ $product['updated_at'] }}</td>
                                <td>
                                    <a href="#editEmployeeModal" class="edit" data-bs-toggle="modal"
                                        data-bs-target="#formProduct" event-type="@update"
                                        input-data="{{ json_encode($product) }}">
                                        <i class="material-icons" title="Edit">&#xE254;</i>
                                    </a>
                                    <a href="#deleteEmployeeModal" class="delete" data-bs-toggle="modal"
                                        data-bs-target="#purgeProduct" event-type="@purge"
                                        input-data="{{ $product['id'] }}">
                                        <i class="material-icons" title="Delete">&#xE872;</i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </main>
    <section id="modal">
        <div class="modal fade" id="formProduct" tabindex="-1" aria-labelledby="formProductLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="form-product" action="{{ url('products') }}" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formProductLabel">Novo produto</h5>

                        </div>
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="form-product-input-name" class="col-form-label">Nome</label>
                                <input type="text" class="form-control" id="form-product-input-name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="tags" class="col-form-label">Tags</label>
                                <select name="tags[]" multiple="multiple" class="form-control"
                                    id="form-product-input-tags">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag['id'] }}">{{ $tag['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer" id="form-product-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
        <div class="modal fade" id="purgeProduct" tabindex="-1" aria-labelledby="formProductLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="form-product-purge" action="{{ url('products') }}" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formProductLabel">Deseja executar ação?</h5>

                        </div>
                        <div class="modal-body">
                            Predente excluir este item?
                            <input name="_method" type="hidden" value="delete">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </section>
@endsection
@section('scriptFooter')
    @parent
    <script type="text/javascript">
        // $(document).ready(function() {
        //     $('#table-itens').DataTable();
        // });

        $(document).ready(function() {

            $('#form-product-input-tags').select2({
                theme: "classic",
                dropdownParent: $("#form-product-footer"),
                width: '100%'
            });

            const formModal = $('#form-product');
            const urlTag = formModal.attr('action');

            const formModalPurge = $('#form-product-purge');
            const urlPurge = formModalPurge.attr('action');


            var formProduct = document.getElementById('formProduct')
            formProduct.addEventListener('show.bs.modal', function(event) {

                const button = event.relatedTarget;
                let eventType = button.getAttribute('event-type');
                let inputData = JSON.parse(button.getAttribute('input-data'));

                if (eventType == "@update") {
                    formModal.attr('action', `${urlTag}/${inputData.id}`);
                    formModal.append(`<input id="method-input" name="_method" type="hidden" value="PUT">`);
                    $("#form-product-input-name").val(inputData.name);
                    // console.log(Object.keys(inputData.tags))
                    let values = Object.keys(inputData.tags);
                    console.log(values);
                    $('#form-product-input-tags').val(values).trigger("change");

                    // $('#form-product-input-name input[type="option"]').each(function() {
                    //     this.checked = true;
                    // });
                }

            });
            var purgeProduct = document.getElementById('purgeProduct')
            purgeProduct.addEventListener('show.bs.modal', function(event) {

                const button = event.relatedTarget;
                let eventType = button.getAttribute('event-type');
                let inputData = JSON.parse(button.getAttribute('input-data'));

                switch (eventType) {
                    case "@purge":

                        formModalPurge.attr('action', `${urlPurge}/${inputData}`);

                        break;
                }

            });
        });
    </script>
@endsection
