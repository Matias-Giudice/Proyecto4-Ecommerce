<?php
	include 'global/config.php';
	include 'global/conexion.php';
	include 'carrito.php';
	include 'templates/cabecera.php';
?>

<?php
//PROCESO DE PAGO (PAYPAL)
	if ($_POST) {
		$total=0;
		$SID=session_id();
		$correo=$_POST['email'];
		//Guardar venta
		foreach($_SESSION['CARRITO'] as $indice=>$producto) {
			$total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
		}
		$sentencia=$pdo->prepare("INSERT INTO `ventas` 
			(`id`, `clavetransaccion`, `paypaldatos`, `fecha`, `correo`, `total`, `status`) 
			VALUES (NULL, :clavetransaccion, '', NOW(), :correo, :total, 'pendiente');");
		$sentencia->bindParam(":clavetransaccion", $SID);
		$sentencia->bindParam(":correo", $correo);
		$sentencia->bindParam(":total", $total);
		$sentencia->execute();
		$idVenta=$pdo->lastInsertId();
		//Guardar detalle venta
		foreach($_SESSION['CARRITO'] as $indice=>$producto) {
			$sentencia=$pdo->prepare("INSERT INTO `detalleventa`
				(`id`, `id_venta`, `id_prod`, `precio_unitario`, `cantidad`, `descargado`) 
				VALUES (NULL, :id_venta, :id_prod, :precio_unitario, :cantidad, '0');");
			$sentencia->bindParam(":id_venta", $idVenta);
			$sentencia->bindParam(":id_prod", $producto['ID']);
			$sentencia->bindParam(":precio_unitario", $producto['PRECIO']);
			$sentencia->bindParam(":cantidad", $producto['CANTIDAD']);
			$sentencia->execute();
		}

		//echo "<h3>".$total."</h3>";
	}
// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-4227550443530130-112301-c68e3c22b7b4b9d6c7690082eee89fd6-676467277');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Total';
$item->quantity = $producto['CANTIDAD'];
$item->unit_price = $total;
$preference->items = array($item);
$preference->save();
?>
<div class="jumbotron text-center">
	<h1 class="display-4">¡Paso Final!</h1>
    <hr class="my-4">
    <p class="lead">Estas a punto de pagar con Mercado Pago la cantidad de:
    	<h4>$<?php echo number_format($total,2);?></h4>
        <script
  src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
  data-preference-id="<?php echo $preference->id; ?>">
</script>
    </p>
    <p>Los productos seran enviados una vez que se procese el pago.</p>
    <!--<strong>(Para aclaraciones enviar mensaje a: giudice.damian@tecnica7.edu.ar / emiliano.buliach@tecnica7.edu.ar / marilyn.cayo@tecnica7.edu.ar)</strong>-->
</div>
<script>
    paypal.Button.render({
        env: 'sandbox', // sandbox | production
        style: {
            label: 'checkout',  // checkout | credit | pay | buynow | generic
            size:  'responsive', // small | medium | large | responsive
            shape: 'pill',   // pill | rect
            color: 'gold'   // gold | blue | silver | black
        },

        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create

        client: {
            sandbox:   'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
            production: 'insert production client id'
        },

        // Wait for the PayPal button to be clicked

        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '<?php echo $total;?>', currency: 'ARS' }, 
                            description:"Compra de productos a Develoteca:$0.01",
                            custom:"Codigo"
                        }
                    ]
                }
            });
        },

        // Wait for the payment to be authorized by the customer

        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                window.aler("Pyment complete");
                console.log(data);
                window.location="verificador.php?paymentToken="+data.paymentToken+"&paymentID="+data.paymentID;
            });
        }
    
    }, '#paypal-button-container');

</script>
<?php include 'templates/pie.php'; ?>


<!--
curl -X POST  -H 'Content-Type: application/json' -H "Authorization: Bearer TEST-755967448312043-111714-b0978c641f5e4fb3f7112c60358ae203-483086418" "https://api.mercadopago.com/users/test_user" -d "{'site_id':'MLA'}"
"id":676467277,"nickname":"TETE9890538","password":"qatest8786","site_status":"active","email":"test_user_58783957@testuser.com" comprador
"id":676465567,"nickname":"TESTYVZDAWPF","password":"qatest9438","site_status":"active","email":"test_user_91203976@testuser.com" vendedor-->