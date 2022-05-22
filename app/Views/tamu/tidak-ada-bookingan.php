<?= $this->extend('tamu/layouts/templates') ?>
<?= $this->section('tamu-content') ?>

<section class="tidak-ada-bookingan">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-8">
            <h1 class="text-center">;( Anda tidak mempunyai Bookingan Kamar</h1>
         </div>
      </div>
   </div>
</section>

<!-- gelombang -->
<div class="gelombang-footer">
   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#eeee" fill-opacity="1"
         d="M0,128L60,149.3C120,171,240,213,360,229.3C480,245,600,235,720,234.7C840,235,960,245,1080,218.7C1200,192,1320,128,1380,96L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
      </path>
   </svg>
</div>

<?= $this->endSection() ?>