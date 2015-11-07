 <?php

class Position {
	public $bdd = null;
	public $point = null;
	public $min = null;
	public $moy = null;
	public $max = null;

	/**
		CONSTRUCTION :
	**/
	public function __construct($bdd) {
		$this->bdd = $bdd;
	}

	public function hydrate($donnees) {
		try {
			foreach ($donnees as $attribut => $valeur) {
				$methode = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $attribut)));

				if (is_callable(array($this, $methode))) {
					$this->$methode($valeur);
				}
			}
			return true;
		} catch(Exception $e) {
			return false;
		}
	}

	public function charger($lat, $lon) {
		$sql = "SELECT lat, lon, point, min, moy, max FROM pluie WHERE 1 ORDER BY ABS((lat - $lat)*(lat - $lat) + (lon - $lon)*(lon - $lon)) LIMIT 1;";
		$request = $this->bdd->query($sql);
		if ($request != false) {
			$donnees = $request->fetch();
			return $this->hydrate($donnees);
		}
		return false;
	}

	/**
		SETTERS :
	**/
	public function setPoint($point) {
		$this->point = $point;
	}
	public function setMin($min) {
		$this->min = $min;
	}
	public function setMoy($moy) {
		$this->moy = $moy;
	}
	public function setMax($max) {
		$this->max = $max;
	}
	public function setSrc($src) {
		$this->src = $src;
	}

	/**
		GETTERS :
	**/
	public function getPoint() {
		return $this->point;
	}
	public function getMin() {
		return $this->min;
	}
	public function getMoy() {
		return $this->moy;
	}
	public function getMax() {
		return $this->max;
	}

	/**
		FONCTIONS :
	**/
	

	/**
		AFFICHAGE / EXPORTATION :
	**/
	public function getJSON() {
		$tags = array('point', 'min', 'moy', 'max');
		$json = array();
		foreach ($tags as $tag) {
			$methode = 'get' . str_replace(' ', '', ucwords(str_replace('_', ' ', $tag)));
			//echo $methode;
			//if (is_callable(array($this, $methode))) {
				$json[$tag] = $this->$tag;
			//}
		}
		return json_encode($json);
	}
	public function getInfo() {
		$surfaceConseillee = ceil(EAU_PAR_PERSONNE_PAR_MOIS / $this->min * 1000);
		$surfaceMinimale = ceil(EAU_PAR_PERSONNE_PAR_MOIS / $this->moy * 1000);

		$html = '';

		$html .= '<div id="eau">';
			$html .= '<h2>Eau</h2>';
			$html .= '<p>Nous avons calculé les surfaces nécessaires pour être autonome en eau :</p>';
			$html .= '<ul>';
				$html .= '<li>Surface minimale : ' . $surfaceMinimale . ' m<sup>2</sup> par personne</li>';
				$html .= '<li>Surface conseillée : ' . $surfaceConseillee . ' m<sup>2</sup> par personne</li>';
			$html .= '</ul>';
		$html .= '</div>';

		$html .= '<div id="energie">';
			$html .= '<h2>Energie</h2>';
			$html .= '<center>';
				$html .= '<div id="chart">';
					$html .= '<canvas id="myChart" width="400" height="400"></canvas>';
					$html .= '<div id="legende"></div>';
				$html .= '</div>';
			$html .= '</center>';
		$html .= '</div>';

		$data = array(
			array(
				'value' => rand(3,8),
				'color' => "#F7464A",
				'highlight' => "#FF5A5E",
				'label' => 'Solaire '
			),
			array(
				'value' => rand(3,8),
				'color' => "#46BFBD",
				'highlight' => "#5AD3D1",
				'label' => 'Eolien '
			),
			array(
				'value' => rand(1,4),
				'color' => "#FDB45C",
				'highlight' => "#FFC870",
				'label' => 'Autre '
			)
		);

		return array('html' => $html, 'data' => $data);
	}

}

?>