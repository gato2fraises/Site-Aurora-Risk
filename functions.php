<?php
// Configuration et fonctions utiles
define('SITE_NAME', 'AURORA');
define('SITE_DESC', 'Coordination Internationale des Crises');
define('SITE_URL', 'https://gato2fraises.github.io/Site-Aurora-Risk/');

function getActivePage() {
    $page = isset($_GET['page']) ? sanitize($_GET['page']) : 'accueil';
    return $page;
}

function sanitize($str) {
    return filter_var($str, FILTER_SANITIZE_STRING);
}

function isActivePage($pageName) {
    return getActivePage() === $pageName ? 'active' : '';
}

function getPageTitle($page = '') {
    if ($page) {
        return "$page - " . SITE_NAME;
    }
    return SITE_NAME . " - " . SITE_DESC;
}

// Classe de gestion des interventions
class InterventionManager {
    private $interventions;
    
    public function __construct() {
        $this->interventions = [
            [
                'id' => 1,
                'title' => 'Tremblement de Terre en Turquie',
                'location' => 'Gaziantep, Turquie',
                'status' => 'critique',
                'summary' => 'Réponse d\'urgence massive aux tremblements de terre dévastateurs',
                'description' => 'Coordination d\'une opération de sauvetage internationale impliquant 45 organisations partenaires.',
                'casualties' => '15,000+',
                'teams' => 250,
                'startDate' => '2024-02-06',
                'coordinator' => 'Dr. Marie Dubois',
                'progress' => 75
            ],
            [
                'id' => 2,
                'title' => 'Crise Migratoire en Méditerranée',
                'location' => 'Méditerranée',
                'status' => 'majeure',
                'summary' => 'Opération de sauvetage et d\'assistance humanitaire',
                'description' => 'Gestion des flux migratoires avec assistance aux migrants en détresse.',
                'casualties' => '500+',
                'teams' => 180,
                'startDate' => '2024-01-15',
                'coordinator' => 'Jean-Pierre Martin',
                'progress' => 60
            ],
            [
                'id' => 3,
                'title' => 'Épidémie de Choléra en Afrique de l\'Ouest',
                'location' => 'Région du Sahel',
                'status' => 'majeure',
                'summary' => 'Campagne de vaccination et assistance médicale d\'urgence',
                'description' => 'Déploiement de cliniques mobiles et distribution de vaccins.',
                'casualties' => '2,000+',
                'teams' => 120,
                'startDate' => '2024-03-01',
                'coordinator' => 'Dr. Sophie Laurent',
                'progress' => 45
            ],
            [
                'id' => 4,
                'title' => 'Inondations en Asie du Sud',
                'location' => 'Pakistan, Bangladesh',
                'status' => 'majeure',
                'summary' => 'Assistance aux victimes des inondations catastrophiques',
                'description' => 'Distribution de vivres, eau potable et abris temporaires.',
                'casualties' => '1,200+',
                'teams' => 200,
                'startDate' => '2024-02-20',
                'coordinator' => 'Ahmed Hassan',
                'progress' => 70
            ],
            [
                'id' => 5,
                'title' => 'Conflit en Proche-Orient',
                'location' => 'Gaza, Palestine',
                'status' => 'critique',
                'summary' => 'Opération humanitaire en zone de conflit',
                'description' => 'Fourniture d\'aide médicale, alimentaire et abri à la population civile.',
                'casualties' => '3,000+',
                'teams' => 300,
                'startDate' => '2024-01-01',
                'coordinator' => 'Jessica Williams',
                'progress' => 55
            ]
        ];
    }
    
    public function getAll() {
        return $this->interventions;
    }
    
    public function getById($id) {
        foreach ($this->interventions as $intervention) {
            if ($intervention['id'] == $id) {
                return $intervention;
            }
        }
        return null;
    }
    
    public function filterByStatus($status) {
        $result = [];
        foreach ($this->interventions as $intervention) {
            if ($intervention['status'] === $status) {
                $result[] = $intervention;
            }
        }
        return $result;
    }
    
    public function search($query) {
        $result = [];
        $query = strtolower($query);
        foreach ($this->interventions as $intervention) {
            if (strpos(strtolower($intervention['title']), $query) !== false ||
                strpos(strtolower($intervention['location']), $query) !== false) {
                $result[] = $intervention;
            }
        }
        return $result;
    }
    
    public function getStatistics() {
        return [
            'total' => count($this->interventions),
            'critical' => count($this->filterByStatus('critique')),
            'major' => count($this->filterByStatus('majeure')),
            'active' => count($this->interventions),
            'totalTeams' => array_sum(array_column($this->interventions, 'teams')),
            'totalCasualties' => '22,000+'
        ];
    }
}
?>
