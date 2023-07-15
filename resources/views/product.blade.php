@extends('layouts.main')
@section('container')
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 img">
                            <img class="thumbnail border border-primary" src="https://i.dummyjson.com/data/products/1/thumbnail.jpg" alt="" style="width: 100%; height: auto;">
                            <div class="d-flex justify-content-between mt-2 mini-img overflow-auto" style="width: 370px">
                            </div>
                        </div>
                        <div class="col-md-6 konten">
                            <div class="d-flex justify-content-between">
                                <h3 class="text-primary fw-bold price" id="staticBackdropLabel">Price $234</h3>
                                <div class="text-warning" id="star-ratings">
                                </div>
                            </div>
                            <p class="text-monospace category">Category : asdfasdfsadf</p>
                            <p class="text-monospace brand">Brand : apple</p>
                            <p class="text-monospace stock">Stock : 90000</p>
                            <div class="bg-light p-2">
                                <p class="text-monospace">Deskirpsi :</p>
                                <p class="text-monospace text-justify description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti nemo consectetur temporibus? Maiores ut expedita repellendus non dolore velit et.</p>
                            </div>
                            {{-- <img src="https://i.dummyjson.com/data/products/1/thumbnail.jpg" alt="" style="height:200px"> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end Modal --}}
    <div class="container mt-4">
        <div class="card">
            <div id="view-modal">
            </div>
            <div class="card-header d-flex justify-content-between">
                <h4>Product List </h4>
                
                <button class="btn btn-primary" onclick="getAll()">Show Product</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped text-center" id="table-1">
                        <thead>
                            <tr class="">
                                <th>No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th width="10%">Category</th>
                                <th width="20%">Brand</th>
                                <th width="5%">Stock</th>
                                <th width="10%">Price</th>
                                <th width="16%">Action</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle" id="products">
                        </tbody>
                    </table>
                    <p id="show-item-length"></p>
                </div>
            </div>
        </div>
    </div>
    <script>
        // $(document).ready(function() {
        //     getAll()
        // });
    
        function view(id){
            $.ajax({
                url: "https://dummyjson.com/products/"+id,
                type:"GET",
                success: function(res){
                    $(".img > .mini-img").html('')
                    $("#star-ratings").html(' ')

                    // get int before comma (.)
                    let rating = res.rating.toString().split(".")[0]

                    // create star Solid
                    for(let i = 0; i < rating; i++){
                        $("#star-ratings").append(
                            '<i class="fas fa-star"></i>'
                        )
                    }

                    // create star Reguler
                    for(let i = 0; i < (5-rating); i++){
                        $("#star-ratings").append(
                            '<i class="far fa-star"></i>'
                        )
                    }

                    // modal title
                    $(".modal-header > h5").html(`${res.title}`) 

                    // modal image
                    $("#my_image").attr("src","second.jpg");
                    $(".img > .thumbnail").attr("src", res.thumbnail);
                    res.images.forEach(src => $(".img > .mini-img").append(
                        `<img class="border border-primary mr-2" src="${src}" alt="${res.title}" style="height:70px">`
                    ))

                    // modal konten
                    $(".konten > h3").html(`$${res.price}`) 
                    $(".konten > .category").html(`category : ${res.category}`) 
                    $(".konten > .brand").html(`brand : ${res.brand}`) 
                    $(".konten > .stock").html(`stock : ${res.stock}`) 
                    $(".konten > div > .description").html(`${res.description}`) 
                    $('#staticBackdrop').modal('show')
                },
                error: function(error) {
                    console.log(error)
                }
            });
        }
    
        function getAll(){
            $.ajax({
                url: "https://dummyjson.com/products",
                type:"GET",
                success: function(res){
                    $('#show-item-length').text(`SHOW : ${res.limit} ITEMS`)
                    let data= []
                    res.products.forEach(e => {
                        data.push(
                            `<tr>`+
                                `<td class="align-middle">${e.id}</td>`+
                                `<td><img src="${e.thumbnail}" alt="" style="height:50px"></td>`+
                                `<td class="align-middle">${e.title}</td>`+
                                `<td class="align-middle">${e.category}</td>`+
                                `<td class="align-middle">${e.brand}</td>`+
                                `<td class="align-middle">${e.stock}</td>`+
                                `<td class="align-middle">$ ${e.price}</td>`+
                                `<td class="align-middle">`+
                                    `<div class="d-flex justify-content-around">`+
                                        `<button onclick="view(${e.id})" class="btn btn-sm btn-primary ">`+
                                            `<i class="fas fa-eye"></i> View`+
                                        `</button>`+
                                    `</div>`+
                                `</td>`+
                            `</tr>`
                        )
                    }); 
    
                    res.products.forEach(() => $("#products").html(data))
                        // console.log(res)
    
                },
                error: function(error) {
                    console.log(error)
                }
            });
        }
    </script>
@endsection