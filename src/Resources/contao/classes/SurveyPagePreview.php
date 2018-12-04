<?php

namespace Hschottm\SurveyBundle;

class SurveyPagePreview extends \Backend
{
	/**
	 * Import String library
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Compile format definitions and return them as string
	 * @param array
	 * @param boolean
	 * @return string
	 */
	public function compilePreview($row, $blnWriteToFile=false)
	{
    $surveyPageCollection = \Hschottm\SurveyBundle\SurveyPageModel::findBy(['pid=?', 'sorting<?'], [$row["pid"], $row["sorting"]]);
    $position = (null != $surveyPageCollection) ? $surveyPageCollection->count() + 1 : 1;

		$template = new \FrontendTemplate('be_survey_page_preview');
		$template->page = $GLOBALS['TL_LANG']['tl_survey_page']['page'];
		$template->position = $position;
		$template->title = specialchars($row['title']);
		$template->description = specialchars($row['description']);
		return $template->parse();
	}

}
