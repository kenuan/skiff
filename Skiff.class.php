<?php

class Skiff {
	static public function displayList($args) {
		global $app_url;

		$list = $args[0];
		$listContents = self::getListContents($list);

		self::renderPage('list', $list, $listContents, $app_url);
	}

	static public function displayHome() {
		echo "Skiff home.";
	}

	static public function display404() {
		echo "404";
	}

	static public function getListContents($list) {
		if (file_exists("lists/$list.text")) {
			$listContents = file_get_contents("lists/$list.text");
			$articles = explode('## ', $listContents);
			array_shift($articles);

			$patterns = array('/^([^\n]*)\n\n/', '/\* ([^\n]*)/');
			$replacements = array("<h2>$1</h2>\n<ul>\n", "\t<li>$1</li>");

			$str = '';
			foreach ($articles as $article) {
				$contents = trim($article);
				$contents = preg_replace($patterns, $replacements, $contents);
				$contents .= "</ul>";

				$str .= "<article>\n$contents\n</article>\n\n";
			}
		}

		return $str;
	}

	static public function renderPage($type, $list, $listContents, $app_url) {
		$options = array(
			"type" => $type,
			"list" => $list,
			"contents" => $listContents,
			"app_url" => $app_url
		);

		include "templates/$type.php";
	}
}

?>
