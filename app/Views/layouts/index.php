<?php
helper('EncryptionHelper');
helper('text');
?>
<!doctype html>
<html lang="en" class="no-js">


<head>
	<title><?= $_ENV['PROJECT_NAME']; ?> - The Warantty Website</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="meta description">
	<link rel="shortcut icon" href="" type="image/x-icon">
	<!-- fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Manrope:wght@200..800&family=Public+Sans:ital,wght@0,100..900;1,100..900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Sora:wght@100..800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
	<!-- all css -->
	<style>
		:root {
			--primary-color: #00234D;
			--secondary-color: #0064A9;

			--btn-primary-border-radius: 0.25rem;
			--btn-primary-color: #fff;
			--btn-primary-background-color: #00234D;
			--btn-primary-border-color: #00234D;
			--btn-primary-hover-color: #fff;
			--btn-primary-background-hover-color: #00234D;
			--btn-primary-border-hover-color: #00234D;
			--btn-primary-font-weight: 500;

			--btn-secondary-border-radius: 0.25rem;
			--btn-secondary-color: #00234D;
			--btn-secondary-background-color: transparent;
			--btn-secondary-border-color: #00234D;
			--btn-secondary-hover-color: #fff;
			--btn-secondary-background-hover-color: #00234D;
			--btn-secondary-border-hover-color: #00234D;
			--btn-secondary-font-weight: 500;

			--heading-color: #000;
			--heading-font-family: 'Poppins', sans-serif;
			--heading-font-weight: 700;

			--title-color: #000;
			--title-font-family: 'Poppins', sans-serif;
			--title-font-weight: 400;

			--body-color: #000;
			--body-background-color: #fff;
			--body-font-family: 'Poppins', sans-serif;
			--body-font-size: 14px;
			--body-font-weight: 400;

			--section-heading-color: #000;
			--section-heading-font-family: 'Poppins', sans-serif;
			--section-heading-font-size: 48px;
			--section-heading-font-weight: 600;

			--section-subheading-color: #000;
			--section-subheading-font-family: 'Poppins', sans-serif;
			--section-subheading-font-size: 16px;
			--section-subheading-font-weight: 400;
		}
	</style>
	<style type="text/css">
		#toolbarContainer {
			display: none;
		}
	</style>

	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/assets/css/vendor.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/assets/css/style.css?v=<?php echo time(); ?>">
	<!-- Toastr -->
	<link rel="stylesheet" href="<?= base_url('public'); ?>/plugins/toastr/toastr.min.css?v=<?php echo time(); ?>">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?= base_url('public'); ?>/plugins/select2/css/select2.min.css?v=<?php echo time(); ?>">
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?= base_url('public'); ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<?php
$cust_id = time(); //mt_rand(1, 100000); // Generates a random 12-digit integer
if (!session()->has('sVisitorId')) {
	session()->set(['sVisitorId' => random_string('alnum', 28)]);
	session()->set(['cust_id' => $cust_id]);  //newly created : today 23 Aug
}

// print_r(session()->get('sVisitorId'));
?>

<body>
	<div class="body-wrapper">
		<?= view('common/header'); ?>
		<?= $this->renderSection('content') ?>
		<?= view('common/footer'); ?>
		<!--Start of Tawk.to Script-->
		<script type="text/javascript">
			// var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
			// (function(){
			// 	var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
			// 	s1.async=true;
			// 	s1.src='https://embed.tawk.to/66f663b9e5982d6c7bb56e11/1i8p7b43r';
			// 	s1.charset='UTF-8';
			// 	s1.setAttribute('crossorigin','*');
			// 	s0.parentNode.insertBefore(s1,s0);
			// })();

			// var removeBranding = function() {
			//     try {
			//         var element = document.querySelector("iframe[title*=chat]:nth-child(2)").contentDocument.querySelector(`a[class*=tawk-branding]`)

			//         if (element) {
			//             element.remove()
			//         }
			//     } catch (e) {}
			// }

			// var tick = 100
			// setInterval(removeBranding, tick)
		</script>
		<!--End of Tawk.to Script-->
		<?= $this->renderSection('extra_script'); ?>
</body>

</html>