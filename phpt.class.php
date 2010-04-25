<?php
/**
 * File: PHPT Parser
 * 	Parses PHPT test files into sections.
 *
 * Version:
 * 	2010.04.24
 *
 * Author:
 * 	Ryan Parman <ryan@ryanparman.com>
 *
 * License:
 * 	MIT License - http://www.opensource.org/licenses/mit-license.php
 */

class PHPT_Parser
{
	/**
	 * Property: $text
	 * 	Holds the text of the PHPT file.
	 */
	private $text;

	/**
	 * Property: $matches
	 * 	Holds the section matches we found inside the PHPT file.
	 */
	private $matches;

	/**
	 * Method: __construct()
	 * 	The constructor.
	 *
	 * Access:
	 * 	public
	 *
	 * Parameters:
	 * 	$text - _string_ (Required) The text of the PHPT file.
	 *
	 * Returns:
	 * 	`$this`
	 */
	public function __construct($text)
	{
		$this->text = $text;
		$this->parse();
		return $this;
	}

	/**
	 * Method: get_section()
	 * 	Returns either the section asked for, or all sections.
	 *
	 * Access:
	 * 	public
	 *
	 * Parameters:
	 * 	$section - _string_ (Optional) The name of the PHPT section to retrieve the content for.
	 *
	 * Returns:
	 * 	_string_|_array_ Either the content of the section you asked for, or an associative array of all sections.
	 */
	public function get_section($section = null)
	{
		if ($section)
		{
			return $this->matches[$section];
		}

		return $this->matches;
	}

	/**
	 * Method: parse()
	 * 	Parses the text passed into the constructor.
	 *
	 * Access:
	 * 	private
	 *
	 * Returns:
	 * 	void
	 */
	private function parse()
	{
		// Prepare to store the matches we want to keep.
		$matches = array();

		// Grab the section headers.
		preg_match_all('/--([A-Z_]+)--/Usx', $this->text, $m);

		// Loop through the section headers, in order.
		for ($i = 0, $max = count($m[0]); $i < $max; $i++)
		{
			// Use the current and next section headers to determine the content of each section.
			preg_match('/' . $m[0][$i] . '(.*)' . (isset($m[0][$i+1]) ? $m[0][$i+1] : '$') . '/Usx', $this->text, $sm);

			// Store matches as key-value pairs.
			$matches[$m[1][$i]] = trim($sm[1]);
		}

		// Make it available to the rest of the class.
		$this->matches = $matches;
	}
}
