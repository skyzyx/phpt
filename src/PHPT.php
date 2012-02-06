<?php
/**
 * Copyright (c) 2010-2012 [Ryan Parman](http://ryanparman.com)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * <http://www.opensource.org/licenses/mit-license.php>
 */


namespace Skyzyx\Components
{
	/**
	 * Parses PHPT test files into sections.
	 *
	 * @version 2012.02.05
	 * @author Ryan Parman <http://ryanparman.com>
	 */
	class PHPT
	{
		/**
		 * Stores the text of the PHPT file.
		 */
		private $text;

		/**
		 * Stores the section matches we found inside the PHPT file.
		 */
		private $matches;

		/**
		 * Constructs a new instance of <Skyzyx\Components\PHPT>.
		 *
		 * @param string $text (Required) The text of the PHPT file.
		 * @return void
		 */
		public function __construct($text)
		{
			$this->text = $text;
			$this->parse();
		}

		/**
		 * Returns either the section asked for, or all sections.
		 *
		 * @param string $section (Optional) The name of the PHPT section to retrieve the content for.
		 * @return string|array Either the content of the section you asked for, or an associative array of all sections.
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
		 * Parses the text passed into the constructor.
		 *
		 * @return void
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
				preg_match('/' . $m[0][$i] . '(.*)' . (isset($m[0][$i + 1]) ? $m[0][$i + 1] : '$') . '/Usx', $this->text, $sm);

				// Store matches as key-value pairs.
				$matches[$m[1][$i]] = trim($sm[1]);
			}

			// Make it available to the rest of the class.
			$this->matches = $matches;
		}
	}
}
