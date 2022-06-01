<?php
include 'modelo/conexioni.php';
$ref = $_POST['tipo'].date("Ymdhis");
$valor = $_POST['precio'];
$id = $_POST['plan'];
$pasar = '4Vj8eK4rloUd272L48hsrarnUA~508029~'.$ref.'~'.$valor.'~COP';
$firma = md5($pasar);
$result = mysqli_query($con,"select *,b.valor from planes a, planes_precios b where a.id_plan=b.id_plan and a.estado=0 and b.id_precio='$id' ");
            
                    $r = mysqli_fetch_array($result);
                      $valorx =$r['valor'];
                      $productox = $r['descripcion'];
                      $cantidadx = $r['mes'];
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Compra eFX</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="../assets/plugins/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/plugins/font-awesome/5.3/css/all.min.css" rel="stylesheet" />
	<link href="../assets/plugins/animate/animate.min.css" rel="stylesheet" />
	<link href="../assets/css/e-commerce/style.min.css" rel="stylesheet" />
	<link href="../assets/css/e-commerce/style-responsive.min.css" rel="stylesheet" />
	<link href="../assets/css/e-commerce/theme/default.css" id="theme" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="../assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="bg-silver">
	<!-- BEGIN #page-container -->
	<div id="page-container" class="fade">
	
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
							<a href="index.html">
								<span class="brand"></span>
								<span>e</span>FX
								<small>Modulo de Pagos</small>
							</a>
						</div>
					</div>
					<!-- END navbar-header -->
			
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
									<img src="../assets/img/user/user-1.jpg" class="user-img" alt="" /> 
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
		
		<!-- BEGIN #checkout-info -->
		<div class="section-container" id="checkout-info">
			<!-- BEGIN container -->
			<div class="container">
				<!-- BEGIN checkout -->
				<div class="checkout">
					<!--<form  method="POST" name="form1" class="form-horizontal" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/">-->
                     <form  method="POST" name="form1" class="form-horizontal" action="checkout_pagar.php">                   
						<!-- BEGIN checkout-header -->
						<div class="checkout-header">
							<!-- BEGIN row -->
							<div class="row">
								<!-- BEGIN col-3 -->
								<div class="col-md-3 col-sm-3">
									<div class="step">
										<a href="#">
											<div class="number">1</div>
											<div class="info">
												<div class="title">Opcion de Pago</div>
												<div class="desc">Selecciona hasta 12 meses.</div>
											</div>
										</a>
									</div>
								</div>
								<!-- END col-3 -->
								<!-- BEGIN col-3 -->
								<div class="col-md-3 col-sm-3">
									<div class="step active">
										<a href="checkout_info.html">
											<div class="number">2</div>
											<div class="info">
												<div class="title">Ingresa Tus datos</div>
												<div class="desc">Registra tu datos para realizar el pedido.</div>
											</div>
										</a>
									</div>
								</div>
								<!-- END col-3 -->
							</div>
							<!-- END row -->
						</div>
						<!-- END checkout-header -->
						<!-- BEGIN checkout-body -->
						<div class="checkout-body">
							
                                                    <div class="form-group row">
								<label class="col-form-label col-md-4 text-lg-right">
								Nit ó C.C<span class="text-danger">*</span>
								</label>
								<div class="col-md-4">
									<input type="text" class="form-control" id="doc"  name="doc"value="" placeholder="" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-md-4 text-lg-right">
								Nombre Completo <span class="text-danger">*</span>
								</label>
								<div class="col-md-4">
									<input type="text" class="form-control" id="nombre"  name="nombre" value="" placeholder="" />
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-form-label col-md-4 text-lg-right">
								Telefono <span class="text-danger">*</span>
								</label>
								<div class="col-md-4">
									<input type="text" class="form-control" id="telefono" name="telefono" value="" placeholder="" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-md-4 text-lg-right">
								Email <span class="text-danger">*</span>
								</label>
								<div class="col-md-4">
                                                                    <input type="text" class="form-control" name="buyerEmail" id="ema" value=""  onchange="caracteresCorreoValido()" />
								</div>
							</div>
                                                    <div class="form-group row">
								<label class="col-form-label col-md-4 text-lg-right">
								Confirmar Email <span class="text-danger">*</span>
								</label>
								<div class="col-md-4">
                                                                    <input type="text" class="form-control" name="" id="cema" value="" />
								</div>
							</div>
                                                    <div class="form-group row">
								<label class="col-form-label col-md-4 text-lg-right">
								producto <span class="text-danger">*</span>
								</label>
								<div class="col-md-4">
									<input type="hidden" class="form-control" name="plan" id="plan" value="<?php echo $id; ?>" placeholder="" disabled/>
									<input type="text" class="form-control" name="producto" id="producto" value="<?php echo $productox ?>" placeholder="" disabled/>
								</div>
							</div>
                                                    <div class="form-group row">
								<label class="col-form-label col-md-4 text-lg-right">
								Meses <span class="text-danger">*</span>
								</label>
								<div class="col-md-4">
									
									<input type="text" class="form-control" name="cantidad" id="cantidad" value="<?php echo $_POST['can'] ?>" placeholder="" disabled/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-md-4 text-lg-right">
								Valor a Cancelar <span class="text-danger">*</span>
								</label>
								<div class="col-md-4">
									
									<input type="text" class="form-control" id="address_2" value="<?php echo $_POST['precio'] ?>" placeholder="" disabled/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-md-4 text-lg-right">
								Referencia del producto<span class="text-danger">*</span>
								</label>
								<div class="col-md-4">
									<input type="text" class="form-control" id="codigo" value="<?php echo $ref ?>" placeholder="" disabled/>
									
								</div>
							</div>
							<hr />
							<div class="m-b-5"><b>Politica de Privacidad</b></div>
							<ul class="checkout-info-list">
								<li>Signature may be required for delivery</li>
								<li>We do not ship to P.O. boxes</li>
								<li>Delivery estimates below include item preparation and shipping time</li>
								<li>We do not ship directly to APO/FPO addresses.</li>
							</ul>
                                                        
<input name="merchantId"    type="hidden"  value="508029"   >
  <input name="accountId"     type="hidden"  value="512321" >
  <input name="description"   type="hidden"  value="Plan <?php echo $productox ?> x <?php echo $_POST['can'] ?> Mes"  >
  <input name="referenceCode" type="hidden"  value="<?php echo $ref ?>" >
  <input name="amount"        type="hidden" id="precio"  value="<?php echo $_POST['precio'] ?>"   >
  <input name="tax"           type="hidden"  value="0"  >
  <input name="taxReturnBase" type="hidden"  value="0" >
  <input name="currency"      type="hidden"  value="COP" >
  <input name="signature"     type="hidden"  value="<?php echo $firma ?>"  >
  <input name="test"          type="hidden"  value="1" >
 
  <input name="responseUrl"    type="hidden"  value="https://efx.com.co/index_compra.html" >
  <input name="confirmationUrl"    type="hidden"  value="https://efx.com.co/okpagos.php" >


						</div>
						<!-- END checkout-body -->
						<!-- BEGIN checkout-footer -->
						<div class="checkout-footer">
							<a href="checkout_cart.php?tipo=<?php echo $_POST['tipo'] ?>&valor=<?php echo $_POST['precio'] ?>" class="btn btn-white btn-lg pull-left">Regresar</a>
                                                        <button type="button" class="btn btn-inverse btn-lg p-l-30 p-r-30 m-l-10" id="pagar">Completar Pedido</button>
						</div>
						<!-- END checkout-footer -->
					</form>
				</div>
				<!-- END checkout -->
			</div>
			<!-- END container -->
		</div>
		<!-- END #checkout-info -->
		
	
		
		
		<!-- BEGIN #footer-copyright -->
		<div id="footer-copyright" class="footer-copyright">
			<!-- BEGIN container -->
			<div class="container">
				<div class="payment-method">
					<img src="../assets/img/payment/payment-method.png" alt="" />
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
				<li><a href="javascript:;" class="bg-red" data-theme="red" data-theme-file="../assets/css/e-commerce/theme/red.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red" data-original-title="" title="">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-pink" data-theme="pink" data-theme-file="../assets/css/e-commerce/theme/pink.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Pink" data-original-title="" title="">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-orange" data-theme="orange" data-theme-file="../assets/css/e-commerce/theme/orange.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange" data-original-title="" title="">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-yellow" data-theme="yellow" data-theme-file="../assets/css/e-commerce/theme/yellow.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Yellow" data-original-title="" title="">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-lime" data-theme="lime" data-theme-file="../assets/css/e-commerce/theme/lime.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Lime" data-original-title="" title="">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-green" data-theme="green" data-theme-file="../assets/css/e-commerce/theme/green.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Green" data-original-title="" title="">&nbsp;</a></li>
				<li class="active"><a href="javascript:;" class="bg-teal" data-theme="default" data-theme-file="../assets/css/e-commerce/theme/default.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default" data-original-title="" title="">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-aqua" data-theme="aqua" data-theme-file="../assets/css/e-commerce/theme/aqua.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Aqua" data-original-title="" title="">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-blue" data-theme="blue" data-theme-file="../assets/css/e-commerce/theme/blue.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue" data-original-title="" title="">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-purple" data-theme="purple" data-theme-file="../assets/css/e-commerce/theme/purple.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple" data-original-title="" title="">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-indigo" data-theme="indigo" data-theme-file="../assets/css/e-commerce/theme/indigo.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Indigo" data-original-title="" title="">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-black" data-theme="black" data-theme-file="../assets/css/e-commerce/theme/black.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black" data-original-title="" title="">&nbsp;</a></li>
			</ul>
		</div>
	</div>
	<!-- end theme-panel -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="../assets/plugins/jquery/jquery-3.3.1.min.js"></script>
	<script src="../assets/plugins/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="../assets/plugins/js-cookie/js.cookie.js"></script>
	<script src="../assets/plugins/paroller/jquery.paroller.min.js"></script>
	<script src="../assets/js/e-commerce/apps.min.js"></script>
        <script src="../assets/js/validador.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
</body>
</html>
