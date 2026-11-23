<div class="row mt-4">

    <div class="col-12">

        <div class="card shadow-sm border-0 border-start border-primary border-4">

            <div class="card-body p-4">

                <h4 class="mb-2">

                    Selamat Datang,
                    <?= htmlspecialchars($_SESSION['nama']) ?>!

                </h4>

                <p class="text-muted mb-0">

                    Saat ini Anda mengakses sistem dengan hak akses sebagai

                    <strong>
                        <?= htmlspecialchars($_SESSION['role']) ?>
                    </strong>.

                </p>

            </div>

        </div>

    </div>

</div>

<div class="row g-3 mt-2">

    <div class="col-md-4">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-body">

                <i class="bi bi-box-seam fs-2 text-primary"></i>

                <h5 class="mt-2">Data Produk</h5>

                <p class="text-muted small">
                    Menu pengelolaan data produk.
                </p>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-body">

                <i class="bi bi-people fs-2 text-success"></i>

                <h5 class="mt-2">Data Pelanggan</h5>

                <p class="text-muted small">
                    Menu pengelolaan data pelanggan.
                </p>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-body">

                <i class="bi bi-receipt fs-2 text-warning"></i>

                <h5 class="mt-2">Faktur & Kuitansi</h5>

                <p class="text-muted small">
                    Informasi faktur dan kuitansi.
                </p>

            </div>

        </div>

    </div>

</div>