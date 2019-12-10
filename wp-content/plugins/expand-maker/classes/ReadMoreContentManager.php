<?php

class ReadMoreContentManager {

	private $content;
	private $startIndex;
	private $endIndex;
	private $readMoreId;
	private static $instance;

	public function setContent($content) {

		$this->content = $content;
	}

	public function getContent() {

		return $this->content;
	}

	public function setStartIndex($startIndex) {

		$this->startIndex = $startIndex;
	}

	public function getStartIndex() {

		return $this->startIndex;
	}

	public function setEndIndex($endIndex) {

		$this->endIndex = $endIndex;
	}

	public function getEndIndex() {

		return $this->endIndex;
	}

	public function setReadMoreId($readMoreId) {

		$this->readMoreId = $readMoreId;
	}

	public function getReadMoreId() {

		return $this->readMoreId;
	}

	public static function doFilterContent($content, $post, $result)
	{
		$filterContent = $content;
		self::$instance = new self();
		$resultOptions = json_decode($result['options'], true);
		$startIdnex = (int)$resultOptions['hide-after-word-count'];
		if(get_post_type() == 'post' && !empty($resultOptions['button-for-post']) && !empty($startIdnex)) {
			$startIndex = ++ $resultOptions['hide-after-word-count'];

			$obj = self::$instance;
			$obj->setContent($content);
			$obj->setStartIndex($startIndex);
			$obj->setReadMoreId($result['button_id']);
			$filterContent = $obj->addButton();
		}
		
		return $filterContent;
	}

	public function addButton() {

		if(!$this->isMustModifed()) {
			return $this->getContent();
		}
	
		$contents = $this->getSeperateContents();
		$readMoreId  = $this->getReadMoreId();
		$modifiedContent = $this->closetags($contents['visible']);

		$dataObj = new ReadMoreData();
		$dataObj->setId($readMoreId);
		$savedData = $dataObj->getSavedOptions();

		if(empty($savedData)) {
			return $content;
		}

		$savedData['moreName'] = 'Read more';
		$savedData['lessName'] = 'Read less';

		$includeManagerObj = new ReadMoreIncludeManager();
		$includeManagerObj->setId($readMoreId);
		$includeManagerObj->setData($savedData);
		$includeManagerObj->setDataObj($dataObj);
		$hiddenCOntent = $this->closetags($contents['hiddenData']);
		$includeManagerObj->setToggleContent($hiddenCOntent);
		$modifiedContent .= $includeManagerObj->render();
		
		return $modifiedContent;
	}
	
	public function closetags($html) {
		return $html;
		preg_match_all('#<([a-z]+)(?: .*)?(?<![/|/ ])>#iU', $html, $result);
		$openedtags = $result[1];

		preg_match_all('#</([a-z]+)>#iU', $html, $result);
		$closedtags = $result[1];
		$len_opened = count($openedtags);
		if (count($closedtags) == $len_opened) {
			return $html;
		}
		$openedtags = array_reverse($openedtags);
		for ($i=0; $i < $len_opened; $i++) {
			if (!in_array($openedtags[$i], $closedtags)){
				$html .= '</'.$openedtags[$i].'>';
			} else {
				unset($closedtags[array_search($openedtags[$i], $closedtags)]);
			}
		}
		return $html;
	}

	public function getSeperateContents() {

		$startIdnex = $this->getStartIndex();
		$content =  $this->getContent();
		$filterData  = array();

		$words = explode(" ", $content);
		$searchWord = @$words[$startIdnex];
		$allSize = count($words);

		$hiddenData = array_slice($words, $startIdnex, $allSize);
		$visibleDta = array_slice($words, 0, $startIdnex);
		
		$filterData['visible'] = implode(' ', $visibleDta);
		$filterData['hiddenData'] = implode(' ', $hiddenData);
		
		return $filterData;
	}

	public function isMustModifed() {

		$content = $this->getContent();
		$totalWords = count(explode(" ", $content));
		$satisfay = true;
		
		if($totalWords < $this->getStartIndex()) {
			$satisfay = false;
		}

		return $satisfay;
	}
}