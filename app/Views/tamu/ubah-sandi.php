<?= $this->extend('tamu/layouts/templates') ?>
<?= $this->section('tamu-content') ?>

<!-- data-reservasi -->
<section class="data-reservasi">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="text-center mb-4">
					<img src="<?= base_url('/foto_profile/'.session()->foto_profile) ?>" alt="<?= session()->nama_lengkap ?>"
					class="w-10 rounded-circle img-thumbnail border border-info">
					<h3 class="mt-2"><?= session()->nama_lengkap ?></h3>
					<div class="berhasilUpdateSandi" data-flashdata="<?= session()->getFlashdata('berhasilUpdateSandi') ?>"></div>
				</div>
			</div>
		</div>
		<div class="updateProfileBerhasil" data-flashdata="<?= session()->getFlashdata('updateBerhasil') ?>"></div>
		<div class="row justify-content-center">
			<div class="col-lg-10 col-sm-12">
				<form action="<?= base_url('/page-tamu/profile/ubah-sandi') ?>" method="post">
					<?= csrf_field() ?>
					<div class="row mb-3">
						<label for="sandilama" class="col-sm-3 col-form-label">Kata sandi lama</label>
						<div class="col-sm-9">
							<input type="password"
							class="form-control <?= (session()->getFlashdata('sandiTidakSesuai') || $validasi->hasError('sandilama')) ? 'is-invalid' : '' ?>" autofocus 
							id="sandilama" name="sandilama">
							<div class="invalid-feedback">
								<?= session()->getFlashdata('sandiTidakSesuai') ?>
							</div>
						</div>
					</div>
					<div class="row mb-3">
						<label for="sandibaru" class="col-sm-3 col-form-label">Sandi baru</label>
						<div class="col-sm-9">
							<input type="password" name="sandibaru"
							class="form-control <?= ($validasi->hasError('sandibaru')) ? 'is-invalid' : '' ?>"
							id="sandibaru">
							<div class="invalid-feedback">
								<?= $validasi->getError('sandibaru') ?>
							</div>
						</div>
					</div>
					<div class="row mb-3">
						<label for="konfsandibaru" class="col-sm-3 col-form-label">Konfirmasi kata sandi</label>
						<div class="col-sm-9">
							<input type="password" class="form-control <?= (session()->getFlashdata('pwTidakSama')) ? 'is-invalid' : '' ?>"
							name="konfsandibaru" id="konfsandibaru">
							<div class="invalid-feedback">
								<?= session()->getFlashdata('pwTidakSama') ?>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary float-end"><i class="bi bi-key-fill"></i>
					Perbarui Kata Sandi</button>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- end data-reservasi -->

<!-- gelombang -->
<div class="gelombang-footer">
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
		<path fill="#eeee" fill-opacity="1"
		d="M0,128L60,149.3C120,171,240,213,360,229.3C480,245,600,235,720,234.7C840,235,960,245,1080,218.7C1200,192,1320,128,1380,96L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
	</path>
</svg>
</div>

<?= $this->endSection() ?>