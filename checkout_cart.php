<?php 
include 'modelo/conexioni.php';
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Planes</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="assets/plugins/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/font-awesome/5.3/css/all.min.css" rel="stylesheet" />
	<link href="assets/plugins/animate/animate.min.css" rel="stylesheet" />
	<link href="assets/css/e-commerce/style.min.css" rel="stylesheet" />
	<link href="assets/css/e-commerce/style-responsive.min.css" rel="stylesheet" />
	<link href="assets/css/e-commerce/theme/default.css" id="theme" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="bg-silver">
	<!-- BEGIN #page-container -->
	<div id="page-container" class="fade">
		<!-- BEGIN #top-nav -->
		
		
		<!-- BEGIN #header -->
		<div id="header" class="header">
			<!-- BEGIN container -->
			<div class="container">
				<!-- BEGIN header-container -->
				<div class="header-container">
					<!-- BEGIN navbar-header -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="header-logo">
							<a href="index_compra.html">
								<span class="brand"></span>
								<span>e</span>FX
								<small>Modulo de Cotizacion</small>
							</a>
						</div>
					</div>
					<!-- END navbar-header -->
					<!-- BEGIN header-nav -->
					
                                       
					<!-- END header-nav -->
					<!-- BEGIN header-nav -->
					<div class="header-nav">
						<ul class="nav pull-right">
							<li class="dropdown dropdown-hover">
								<a href="#" class="header-cart" data-toggle="dropdown">
									<i class="fa fa-shopping-bag"></i>
									<span class="total">2</span>
									<span class="arrow top"></span>
								</a>
								<div class="dropdown-menu dropdown-menu-cart p-0">
									<div class="cart-header">
										<h4 class="cart-title">Shopping Bag (1) </h4>
									</div>
									<div class="cart-body">
										<ul class="cart-item">
											<li>
												<div class="cart-item-image"><img src="assets/img/product/compras.png" alt="" /></div>
												<div class="cart-item-info">
													<h4>Plan <?php echo $_GET['tipo'] ?></h4>
													<p class="price">$<?php echo $_GET['valor'] ?></p>
												</div>
												<div class="cart-item-close">
													<a href="#" data-toggle="tooltip" data-title="Remove">&times;</a>
												</div>
											</li>
											
										</ul>
									</div>
									<div class="cart-footer">
										<div class="row row-space-10">
											<div class="col-xs-6">
												<a href="checkout_cart.html" class="btn btn-default btn-block">View Cart</a>
											</div>
											<div class="col-xs-6">
												<a href="checkout_cart.html" class="btn btn-inverse btn-block">Checkout</a>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<a href="my_account.html">
									<img src="assets/img/user/user-1.jpg" class="user-img" alt="" /> 
									<span class="d-none d-xl-inline">Iniciar sesión / Registrarse</span>
								</a>
							</li>
						</ul>
					</div>
					<!-- END header-nav -->
				</div>
				<!-- END header-container -->
			</div>
			<!-- END container -->
		</div>
		<!-- END #header -->
		
		<!-- BEGIN #checkout-cart -->
		<div class="section-container" id="checkout-cart">
			<!-- BEGIN container -->
			<div class="container">
				<!-- BEGIN checkout -->
				<div class="checkout">
					<div>
						<!-- BEGIN checkout-header -->
						<div class="checkout-header">
							<!-- BEGIN row -->
							<div class="row">
								<!-- BEGIN col-3 -->
								<div class="col-md-3 col-sm-3">
									<div class="step active">
										<a href="#">
											<div class="number">1</div>
											<div class="info">
												<div class="title">Opciones de Plan</div>
												<div class="desc">Selecciona hasta 12 meses.</div>
											</div>
										</a>
									</div>
								</div>
								<!-- END col-3 -->
								<!-- BEGIN col-3 -->
								<div class="col-md-3 col-sm-3">
									<div class="step">
										<a href="checkout_info.html">
											<div class="number">2</div>
											<div class="info">
												<div class="title">Ingresa Tus datos</div>
												<div class="desc">Datos Basicos para Payu.</div>
											</div>
										</a>
									</div>
								</div>
								
							</div>
							<!-- END row -->
						</div>
						<!-- END checkout-header -->
						<!-- BEGIN checkout-body -->
						<div class="checkout-body">
							<div class="table-responsive">
								<table class="table table-cart">
									<thead>
										<tr>
											<th>Nombre del producto</th>
											<th class="text-center">Precio</th>
											<th class="text-center">Meses</th>
											<th class="text-center">Total</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$result = mysqli_query($con,"select *,b.valor,b.descripcion from planes a, planes_precios b where a.id_plan=b.id_plan and a.estado=0 and a.id_plan='".$_GET['tipo']."' ");
										while($f = mysqli_fetch_array($result)){

										
										?>
										<form action="checkout_info.php" method="POST" name="form_checkout">
										<tr>
											<td class="cart-product">
												<div class="product-img">
													<img src="assets/img/product/compras.png" alt="" />
												</div>
												<div class="product-info">
													<div class="title"><?php echo $f['descripcion'] ?></div>
													<div class="desc">Paga con payu</div>
												</div>
											</td>
											<td class="cart-price text-center">$<?php echo number_format($f['valor']) ?></td>
											<td class="cart-qty text-center">
												<div class="cart-qty-input">
													
                                                        <input type="hidden" name="precio" value="<?php echo $f['valor'] ?>" class="form-control" id="p" />
                                                        <input type="text" name="can" value="<?php echo $f['mes'] ?>" class="form-control" id="c"  readonly/>
                                                        <input type="hidden" name="plan" value="<?php echo $f['id_precio'] ?>" class="form-control" id="valor" />
                                                        <input type="hidden" name="tipo" value="<?php echo $_GET['tipo'] ?>" class="form-control" id="tipo" />
                                                       
												</div>
												
											</td>
                                                                                        <td class="cart-total text-center" id="precio">
												<button type="submit" class="btn btn-inverse btn-lg p-l-30 p-r-30 m-l-10">Agregar</button>
											</td>
										</tr>
									</form>
									<?php } ?>
										
									</tbody>
								</table>
							</div>
						</div>
						<!-- END checkout-body -->
						<!-- BEGIN checkout-footer -->
						<div class="checkout-footer">
                               <a href="index_compra.html" class="btn btn-white btn-lg pull-left">Atras</a>								
						</div>
						<!-- END checkout-footer -->
					</div>
				</div>
				<!-- END checkout -->
			</div>
			<!-- END container -->
		</div>
	
		<!-- BEGIN #footer-copyright -->
		<div id="footer-copyright" class="footer-copyright">
			<!-- BEGIN container -->
			<div class="container">
				<div class="payment-method">
					<img src="assets/img/payment/payment-method.png" alt="" />
				</div>
				<div class="copyright">
					Copyright &copy; 2019 SeanTheme. All rights reserved.
				</div>
			</div>
			<!-- END container -->
		</div>
		<!-- END #footer-copyright -->
	</div>
	<!-- END #page-container -->
	
	<!-- begin theme-panel -->
	<div class="theme-panel">
		<a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
		<div class="theme-panel-content">
			<ul class="theme-list clearfix">
				<li><a href="javascript:;" class="bg-red" data-theme="red" data-theme-file="assets/css/e-commerce/theme/red.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red" data-original-title="" title="">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-pink" data-theme="pink" data-theme-file="assets/css/e-commerce/theme/pink.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Pink" data-original-title="" title="">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-orange" data-theme="orange" data-theme-file="assets/css/e-commerce/theme/orange.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange" data-original-title="" title="">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-yellow" data-theme="yellow" data-theme-file="assets/css/e-commerce/theme/yellow.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Yellow" data-original-title="" title="">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-lime" data-theme="lime" data-theme-file="assets/css/e-commerce/theme/lime.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Lime" data-original-title="" title="">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-green" data-theme="green" data-theme-file="assets/css/e-commerce/theme/green.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Green" data-original-title="" title="">&nbsp;</a></li>
				<li class="active"><a href="javascript:;" class="bg-teal" data-theme="default" data-theme-file="assets/css/e-commerce/theme/default.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default" data-original-title="" title="">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-aqua" data-theme="aqua" data-theme-file="assets/css/e-commerce/theme/aqua.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Aqua" data-original-title="" title="">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-blue" data-theme="blue" data-theme-file="assets/css/e-commerce/theme/blue.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue" data-original-title="" title="">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-purple" data-theme="purple" data-theme-file="assets/css/e-commerce/theme/purple.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple" data-original-title="" title="">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-indigo" data-theme="indigo" data-theme-file="assets/css/e-commerce/theme/indigo.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Indigo" data-original-title="" title="">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-black" data-theme="black" data-theme-file="assets/css/e-commerce/theme/black.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black" data-original-title="" title="">&nbsp;</a></li>
			</ul>
		</div>
	</div>
	<!-- end theme-panel -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/jquery/jquery-3.3.1.min.js"></script>
	<script src="assets/plugins/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="assets/plugins/js-cookie/js.cookie.js"></script>
	<script src="assets/plugins/paroller/jquery.paroller.min.js"></script>
	<script src="assets/js/e-commerce/apps.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
                        $("#c").chance(function(){
                            var c = $(this).val();
                            alert(c);
                        });
		});
                function c(n){
                    var ct = $("#c").val();
                    var p = $("#p").val();
                    var t = parseInt(ct) + parseInt(n);
                    if(parseInt(t) < 1){
                        return false;
                    }
                    $("#c").val(t);
                    var pt = p * t;
                     $.ajax({
                        type: 'GET',
                        data:'pt='+pt,
                        url: 'formatos.php',
                        success: function(d){
                            $("#precio").html(d);
                           $("#total").html(d);
                        }
        });
                    $("#valor").val(pt);
                }
	</script>
</body>
</html>
