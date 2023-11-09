<?php
include_once("navbar.php");
?>
              <!-- Carrousel d'image -->
            <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="./images/BMC-Roadmachine-AMP-@-Jeremie-Reuiller-2227-scaled.jpg" class="img-fluid brightness" alt="">
                  <div class="container">
                    <div class="carousel-caption text-start">
                      <h1>Example headline.</h1>
                      <p class="opacity-75">Some representative placeholder content for the first slide of the carousel.</p>
                      <p><a class="btn btn-lg btn-primary btn-orange" href="connexion.php">S'inscrire</a></p>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="./images/BMC-Roadmachine-AMP-@-Jeremie-Reuiller-2227-scaled.jpg" class="img-fluid brightness" alt="">
                  <div class="container">
                    <div class="carousel-caption">
                      <h1>Another example headline.</h1>
                      <p>Some representative placeholder content for the second slide of the carousel.</p>
                      <p><a class="btn btn-lg btn-primary btn-orange" href="#presentation">En savoir plus</a></p>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="./images/BMC-Roadmachine-AMP-@-Jeremie-Reuiller-2227-scaled.jpg" class="img-fluid brightness" alt="">
                  <div class="container">
                    <div class="carousel-caption text-end">
                      <h1>One more for good measure.</h1>
                      <p>Some representative placeholder content for the third slide of this carousel.</p>
                      <p><a class="btn btn-lg btn-primary btn-orange" href="produit.php">Voir produits</a></p>
                    </div>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
              <!-- Présentation de l'entreprise -->
              <div class="container col-xxl-8 px-4 py-5" id="presentation">
                <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                  <div class="col-10 col-sm-8 col-lg-6">
                    <img src="./images/rockrider.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                  </div>
                  <div class="col-lg-6">
                    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Présentation de Bicycle</h1>
                    <p class="lead">Nous croyons que le cyclisme est bien plus qu'un simple moyen de transport, c'est un mode 
                      de vie qui incarne la santé, la liberté et l'aventure. C'est pourquoi nous proposons une vaste gamme de vélos pour répondre aux besoins variés de notre clientèle, 
                      que vous soyez un cycliste débutant cherchant votre premier vélo ou un professionnel exigeant la performance ultime.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                      <a href="produit.php"><button type="button" class="btn btn-orange btn-lg px-4 me-md-2">Nos produits</button></a>
                      <!-- <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button> -->
                    </div>
                  </div>
                </div>
              </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="accueil.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
// SweetAlert et LocalStorage pour la politique de confidentialité
if (localStorage.getItem("privacyPolicyAccepted") !== "accepted") {
  Swal.fire({
    title: 'Acceptez-vous la politique de confidentialité?',
    showDenyButton: true,
    confirmButtonText: `Accepter`,
    denyButtonText: `Refuser`,
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire('Vous avez accepté la politique de confidentialité', '', 'success')
      localStorage.setItem("privacyPolicyAccepted", "accepted");
    } else if (result.isDenied) {
      Swal.fire('Vous avez refusé la politique de confidentialité', '', 'info')
    }
  })
}
</script>