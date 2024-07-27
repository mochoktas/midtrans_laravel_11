@extends('Layouts.main')
@section('title_page','transaction')
@section('title','checkout')
@section('content')
		
		    <div class="container">
            <div class="row mb-5">
		            <div class="col-md-12">
		              <h2 class="h3 mb-3 text-black">Your Order</h2>
		              <div class="p-3 p-lg-5 border bg-white">
		                <table class="table site-block-order-table mb-5">
		                  <thead>
		                    <th>Product</th>
		                    <th>Total</th>
		                  </thead>
		                  <tbody>
		                    <tr>
		                      <td>Top Up T-Shirt <strong class="mx-2">x</strong> 1</td>
		                      <td>Rp. 250.000</td>
		                    </tr>
		                    <tr>
		                      <td>Polo Shirt <strong class="mx-2">x</strong>   1</td>
		                      <td>Rp. 100.000</td>
		                    </tr>
		                    <tr>
		                      <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
		                      <td class="text-black">Rp. 350.000</td>
		                    </tr>
		                    <tr>
		                      <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
		                      <td class="text-black font-weight-bold"><strong>Rp. 350.000</strong></td>
		                    </tr>
		                  </tbody>
		                </table>

		                

		                <div class="form-group">
                            <form action="{{ route('payment.transaction') }}" method="post">
                                @csrf
                                <input type="hidden" name="amount" value="350000">
                                <button class="btn btn-black btn-lg py-3 btn-block" type="submit" >Order</button>
                            </form>
                            
		                </div>

		              </div>
		            </div>
		          </div>
		  </div>
        
@endsection
		
