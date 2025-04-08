<?php
/**
 * Page d'accueil
 * Cette page est la page principale du site
 */

// Inclure les fonctions communes
require_once __DIR__ .'../functions.php';

// Récupérer la liste des villes depuis la base de données
$cities = [];
try {
    $db = getDbConnection();
    $stmt = $db->query("SELECT id, name FROM cities WHERE is_active = 1 ORDER BY name");
    $cities = $stmt->fetchAll();
} catch (PDOException $e) {
    // Gérer l'erreur silencieusement
}

// Définir le titre de la page
$pageTitle = "Accueil - Wasalni Ebooking";

// Inclure l'en-tête
include_once __DIR__ . '../header.php';
?>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 text-white">Réservez votre louage en ligne</h1>
                <p class="lead text-white mb-4">Voyagez facilement entre les villes tunisiennes avec notre service de réservation de louages en ligne.</p>
                <a href="reservation.php" class="btn btn-danger btn-lg">Réserver maintenant</a>
            </div>
            <div class="col-lg-6">
                <div class="card shadow-lg">
                    <div class="card-body p-4">
                        <h3 class="card-title text-center mb-4">Recherche rapide</h3>
                        <form action="reservation.php" method="GET">
                            <div class="mb-3">
                                <label for="fromCity" class="form-label">Départ</label>
                                <select class="form-select" id="fromCity" name="fromCity" required>
                                    <option value="" selected disabled>Sélectionnez la ville de départ</option>
                                    <?php foreach ($cities as $city): ?>
                                        <option value="<?php echo escape($city['name']); ?>">
                                            <?php echo escape($city['name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="toCity" class="form-label">Arrivée</label>
                                <select class="form-select" id="toCity" name="toCity" required>
                                    <option value="" selected disabled>Sélectionnez la ville d'arrivée</option>
                                    <?php foreach ($cities as $city): ?>
                                        <option value="<?php echo escape($city['name']); ?>">
                                            <?php echo escape($city['name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="departDate" class="form-label">Date de départ</label>
                                <input type="date" class="form-control" id="departDate" name="departDate" min="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-danger">Rechercher</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="container my-5">
    <h2 class="text-center mb-5">Pourquoi choisir Wasalni Ebooking ?</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center p-4">
                    <div class="feature-icon bg-primary bg-gradient text-white rounded-circle mb-3">
                        <i class="bi bi-clock fs-2"></i>
                    </div>
                    <h3 class="card-title">Réservation rapide</h3>
                    <p class="card-text">Réservez votre louage en quelques clics, sans avoir à vous déplacer à la station.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center p-4">
                    <div class="feature-icon bg-primary bg-gradient text-white rounded-circle mb-3">
                        <i class="bi bi-shield-check fs-2"></i>
                    </div>
                    <h3 class="card-title">Sécurité garantie</h3>
                    <p class="card-text">Tous nos partenaires sont vérifiés pour assurer votre sécurité pendant le voyage.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center p-4">
                    <div class="feature-icon bg-primary bg-gradient text-white rounded-circle mb-3">
                        <i class="bi bi-cash-coin fs-2"></i>
                    </div>
                    <h3 class="card-title">Prix transparents</h3>
                    <p class="card-text">Pas de frais cachés, vous savez exactement combien vous allez payer.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Popular Routes Section -->
<div class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-5">Trajets populaires</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h3 class="card-title">Tunis - Sousse</h3>
                        <p class="card-text">Distance: 140 km</p>
                        <p class="card-text">Durée: 1h30 - 2h</p>
                        <p class="card-text">À partir de 15 TND</p>
                        <a href="reservation.php?fromCity=Tunis&toCity=Sousse" class="btn btn-outline-primary">Réserver</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h3 class="card-title">Tunis - Sfax</h3>
                        <p class="card-text">Distance: 270 km</p>
                        <p class="card-text">Durée: 3h - 3h30</p>
                        <p class="card-text">À partir de 25 TND</p>
                        <a href="reservation.php?fromCity=Tunis&toCity=Sfax" class="btn btn-outline-primary">Réserver</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h3 class="card-title">Sousse - Monastir</h3>
                        <p class="card-text">Distance: 20 km</p>
                        <p class="card-text">Durée: 30 min</p>
                        <p class="card-text">À partir de 5 TND</p>
                        <a href="reservation.php?fromCity=Sousse&toCity=Monastir" class="btn btn-outline-primary">Réserver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- How It Works Section -->
<div class="container my-5">
    <h2 class="text-center mb-5">Comment ça marche ?</h2>
    <div class="row g-4">
        <div class="col-md-3">
            <div class="card h-100 border-0">
                <div class="card-body text-center">
                    <div class="step-circle bg-danger text-white mx-auto mb-3">1</div>
                    <h3 class="card-title">Recherchez</h3>
                    <p class="card-text">Sélectionnez votre trajet, la date et l'heure de départ.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100 border-0">
                <div class="card-body text-center">
                    <div class="step-circle bg-danger text-white mx-auto mb-3">2</div>
                    <h3 class="card-title">Réservez</h3>
                    <p class="card-text">Choisissez le type de louage et le nombre de passagers.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100 border-0">
                <div class="card-body text-center">
                    <div class="step-circle bg-danger text-white mx-auto mb-3">3</div>
                    <h3 class="card-title">Confirmez</h3>
                    <p class="card-text">Recevez votre confirmation de réservation par email.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100 border-0">
                <div class="card-body text-center">
                    <div class="step-circle bg-danger text-white mx-auto mb-3">4</div>
                    <h3 class="card-title">Voyagez</h3>
                    <p class="card-text">Présentez-vous à la station à l'heure indiquée et voyagez confortablement.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonials Section -->
<div class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-5">Ce que disent nos clients</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <div class="text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                        </div>
                        <p class="card-text">"Service excellent ! J'ai pu réserver mon louage facilement et tout s'est déroulé comme prévu. Je recommande vivement."</p>
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/50" alt="Photo de profil" class="rounded-circle me-3">
                            <div>
                                <h5 class="mb-0">Sami Ben Salah</h5>
                                <small class="text-muted">Tunis</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <div class="text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                            </div>
                        </div>
                        <p class="card-text">"Très pratique pour réserver à l'avance, surtout pendant les périodes de forte affluence. Le service client est réactif."</p>
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/50" alt="Photo de profil" class="rounded-circle me-3">
                            <div>
                                <h5 class="mb-0">Leila Mansour</h5>
                                <small class="text-muted">Sfax</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <div class="text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                            </div>
                        </div>
                        <p class="card-text">"J'utilise régulièrement ce service pour mes déplacements professionnels. C'est fiable, ponctuel et le prix est raisonnable."</p>
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/50" alt="Photo de profil" class="rounded-circle me-3">
                            <div>
                                <h5 class="mb-0">Karim Mejri</h5>
                                <small class="text-muted">Sousse</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="container my-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card bg-danger text-white">
                <div class="card-body text-center p-5">
                    <h2 class="card-title">Prêt à voyager ?</h2>
                    <p class="card-text lead">Réservez votre louage dès maintenant et voyagez en toute tranquillité.</p>
                    <a href="reservation.php" class="btn btn-light btn-lg">Réserver maintenant</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hero-section {
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                url('https://images.unsplash.com/photo-1528728329032-2972f65dfb3f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80');
    background-size: cover;
    background-position: center;
    padding: 100px 0;
    margin-bottom: 50px;
}

.feature-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 70px;
    height: 70px;
}

.step-circle {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    font-size: 24px;
    font-weight: bold;
}

.bg-primary {
    background-color: #E63946 !important;
}

.btn-primary, .btn-outline-primary {
    background-color: #E63946;
    border-color: #E63946;
}

.btn-primary:hover, .btn-outline-primary:hover {
    background-color: #d32836;
    border-color: #d32836;
}

.btn-outline-primary {
    color: #E63946;
    background-color: transparent;
}

.btn-outline-primary:hover {
    color: white;
}
</style>

<?php
// Inclure le pied de page
include_once __DIR__ . '../footer.php';
?>
