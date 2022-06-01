<?php 
include 'modelo/conexioni.php';
$decodificado = (base64_decode($_GET['id']));
    $_GET['id'] = $decodificado-999999999999999;
$query = mysqli_query($con,"select * from pagosweb where id_pago='".$_GET['id']."' ");
$p = mysqli_fetch_array($query);
$ref = $p['referencia'];
$valor = $p['valor'];
$idplan = $p['id_plan'];
$pasar = 'RMGv76TnxtndWNiuPWoe25j4mB~781993~'.$ref.'~'.$valor.'~COP';
$firma = md5($pasar);

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
    <link href="../assets/css/material/style.min.css" rel="stylesheet" />
	<link href="../assets/css/material/style-responsive.min.css" rel="stylesheet" />
	<link href="../assets/css/material/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	<link href="../assets/css/default/invoice-print.min.css" rel="stylesheet" />
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
				<div>
					<div>
			<!-- begin breadcrumb -->
	
			<!-- end breadcrumb -->
			<!-- begin page-header -->
		
			<!-- end page-header -->
			<!-- begin invoice -->
			<div class="invoice">
				<!-- begin invoice-company -->
				<div class="invoice-company text-inverse f-w-600">
					<span class="pull-right hidden-print">
					
					<a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
					</span>
					Factura de Venta No. <?php echo $p['id_pago'] ?>
				</div>
				<!-- end invoice-company -->
				<!-- begin invoice-header -->
				<div class="invoice-header">
					<div class="invoice-from">
						<small>Empresa</small>
						<address class="m-t-5 m-b-5">
							<strong class="text-inverse">eFX, Compras.</strong><br />
							Calle 86 # 14-19 Ciudad Modesto<br />
							Atlantico - Barranquilla<br />
							Celular +57 (315) 364-2359<br />
							ventas@efx.com.co
						</address>
					</div>
					<div class="invoice-to">
						<small>Cliente</small>
						<address class="m-t-5 m-b-5">
							<strong class="text-inverse"><?php echo $p['empresa'] ?></strong><br />
							<?php echo $p['nit'] ?><br />
							<?php echo $p['telefono'] ?><br />
							
						</address>
					</div>
					<div class="invoice-date">
						<small>Fecha de Pedido</small>
						<div class="date text-inverse m-t-5"><?php echo date("Y-m-d") ?></div>
						<div class="invoice-detail">
							No. <?php echo $p['id_pago'] ?><br />
							Venta de Servicio
						</div>
					</div>
				</div>
				<!-- end invoice-header -->
				<!-- begin invoice-content -->
				<div class="invoice-content">
					<!-- begin table-responsive -->
					<div class="table-responsive">
						<table class="table table-invoice">
							<thead>
								<tr>
									<th>Descripcion del Pedido</th>
									
									<th class="text-center" width="10%">MESES</th>
									<th class="text-right" width="20%">TOTAL</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$result = mysqli_query($con,"select *,b.valor from planes a, planes_precios b where a.id_plan=b.id_plan and a.estado=0 and  b.id_precio='$idplan' ");
								$T=0;
										while($f = mysqli_fetch_array($result)){
											$T +=$f['valor'];
											?>
								<tr>
									<td>
										<span class="text-inverse">PLAN <?php echo $f['plan'] ?></span><br />
										<small>PLAN <?php echo $f['plan'] ?> X <?php echo $f['mes'] ?> Mes </small>
									</td>
							
									<td class="text-center"><?php echo $f['mes'] ?></td>
									<td class="text-right">$<?php echo number_format($f['valor']) ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<!-- end table-responsive -->
					<!-- begin invoice-price -->
					<div class="invoice-price">
						<div class="invoice-price-left">
							<div class="invoice-price-row">
								<div class="sub-price">
									<small>SUBTOTAL</small>
									<span class="text-inverse">$<?php echo number_format($T) ?></span>
								</div>
								<div class="sub-price">
									<i class="fa fa-plus text-muted"></i>
								</div>
								<div class="sub-price">
									<small>Estado del Pedido</small>
									<span class="text-inverse"><?php echo $p['estado'] ?></span>
								</div>
							</div>
						</div>
						<div class="invoice-price-right">
							<small>TOTAL</small> <span class="f-w-600">$<?php echo number_format($T) ?></span>
						</div>
					</div>
					<!-- end invoice-price -->
				</div>
				<!-- end invoice-content -->
				<form  method="POST" name="form1" class="form-horizontal" action="https://checkout.payulatam.com/ppp-web-gateway-payu/">
				<!-- begin invoice-note -->
				<div class="invoice-note hidden-print">
					<input name="merchantId"    type="hidden"  value="781993"   >
  <input name="accountId"     type="hidden"  value="788806" >
  <input name="description"   type="hidden"  value="<?php echo $p['producto'] ?>"  >
  <input type="hidden" class="form-control" name="buyerEmail"  value="<?php echo $p['email'] ?>" />
  <input name="referenceCode" type="hidden"  value="<?php echo $p['referencia'] ?>" >
  <input name="amount"        type="hidden" id="precio"  value="<?php echo $p['valor'] ?>"   >
  <input name="tax"           type="hidden"  value="0" >
  <input name="taxReturnBase" type="hidden"  value="0" >
  <input name="currency"      type="hidden"  value="COP" >
  <input name="signature"     type="hidden"  value="<?php echo $firma ?>"  >
  <input name="test"          type="hidden"  value="0" >
 
  <input name="responseUrl"    type="hidden"  value="https://efx.com.co/index_compra.html" >
  <input name="confirmationUrl"    type="hidden"  value="https://efx.com.co/okpagos.php" >

					<input type="submit" value="Pagar Pedido" class="btn btn-success">
				</form>
				</div>
				<!-- end invoice-note -->
				<!-- begin invoice-footer -->
				<div class="invoice-footer">
					<p class="text-center m-b-5 f-w-600">
						GRACIAS POR SU COMPRA
					</p>
					<p class="text-center">
						<span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> efx.com.co</span>
						<span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:Celular +57 (315) 364-2359</span>
						<span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> info@efx.com.co</span>
					</p>
				</div>
				<!-- end invoice-footer -->
			</div>
			<!-- end invoice -->
		</div>
				</div>
				<!-- END checkout -->
			</div>
			<!-- END container -->
		</div>
		<!-- END #checkout-info -->
		
	
		
		
		<!-- BEGIN #footer-copyright -->
		<div id="footer-copyright" class="footer-copyright  hidden-print">
			<!-- BEGIN container -->
			<div class="container">
				<div class="payment-method">
					<img src="../assets/img/payment/payment-method.png" alt="" />
				</div>
				<div class="copyright">
					Copyright &copy; 2019 efx.com.co. Todos los derechos reservado.
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
