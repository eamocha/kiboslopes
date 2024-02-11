<?php 

//$mysqldate = date( 'Y-m-d H:i:s', $phpdate );

//$phpdate = strtotime( $mysqldate );

date_default_timezone_set('africa/nairobi');

function  titleCase($string)  { 

        $len=strlen($string); 

        $i=0; 

        $last= ""; 

        $new= ""; 

        $string=strtoupper($string); 

        while  ($i<$len): 

                $char=substr($string,$i,1); 

                if  (preg_match( "[A-Z]",$last)): 

                        $new.=strtolower($char); 

                else: 

                        $new.=strtoupper($char); 

                endif; 

                $last=$char; 

                $i++; 

        endwhile; 

        return($new); 

}; 



//Function to sanitize values received from the form. Prevents SQL injection

	function clean($str) {

		$str = @trim($str);

		if(get_magic_quotes_gpc()) {

			$str = stripslashes($str);

		}

		return mysqli_real_escape_string($conn,$str);

	}

	

//Function to sanitize values to numeric only



function strip_no($string)



{

     // This regex pattern means anything that is not a number

     $pattern = '/[^0-9]/';

     // preg_replace searches for the pattern in the string and replaces all instances with an empty string

     return preg_replace($pattern, '', $string);

}



function nicetime($date)

{

    if(empty($date)) {

        return "No date provided";

    }

    

    $periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");

    $lengths         = array("60","60","24","7","4.35","12","10");

    

    $now             = time();

    $unix_date         = strtotime($date);

    

       // check validity of date

    if(empty($unix_date)) {    

        return "Bad date";

    }



    // is it future date or past date

    if($now > $unix_date) {    

        $difference     = $now - $unix_date;

        $tense         = "ago";

        

    } else {

        $difference     = $unix_date - $now;

        $tense         = "from now";

    }

    

    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {

        $difference /= $lengths[$j];

    }

    

    $difference = round($difference);

    

    if($difference != 1) {

        $periods[$j].= "s";

    }

    

    return "$difference $periods[$j] {$tense}";

}

// Generate LOG ID

function genRandomString() {

    $length = 26;

    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';

    $string = "";    



    for ($p = 1; $p < $length; $p++) {

        $string .=$characters[mt_rand(0, strlen($characters))-1];

    }



    return $string;

	}

	

	function genRandomString_small() {

    $length = 6;

    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';

    $string = "";    



    for ($p = 0; $p < $length; $p++) {

        $string .= $characters[mt_rand(0, strlen($characters))-1];

    }



    return $string;

	}

	

 function reduce_str($text, $size)

 {

  

 $length = strlen($text);

  

 if($length>$size)

  {

 $length_fin = substr($text, 0, $size);

  

  $text = $length_fin."..."; 

  

 }

// 3  $string = "This is a sentence that is fairly long"; 

//4  reduce_str($string, 20);

  return($text);

 

 }

 

 function first($array) {

if (!is_array($array)) return $array;

if (!count($array)) return null;

reset($array);

return $array[key($array)];

}



function last($array) {

if (!is_array($array)) return $array;

if (!count($array)) return null;

end($array);

return $array[key($array)];

} 


function url_to_absolute( $baseUrl, $relativeUrl )
{
    // If relative URL has a scheme, clean path and return.
    $r = split_url( $relativeUrl );
    if ( $r === FALSE )
        return FALSE;
    if ( !empty( $r['scheme'] ) )
    {
        if ( !empty( $r['path'] ) && $r['path'][0] == '/' )
            $r['path'] = url_remove_dot_segments( $r['path'] );
        return join_url( $r );
    }
 
    // Make sure the base URL is absolute.
    $b = split_url( $baseUrl );
    if ( $b === FALSE || empty( $b['scheme'] ) || empty( $b['host'] ) )
        return FALSE;
    $r['scheme'] = $b['scheme'];
 
    // If relative URL has an authority, clean path and return.
    if ( isset( $r['host'] ) )
    {
        if ( !empty( $r['path'] ) )
            $r['path'] = url_remove_dot_segments( $r['path'] );
        return join_url( $r );
    }
    unset( $r['port'] );
    unset( $r['user'] );
    unset( $r['pass'] );
 
    // Copy base authority.
    $r['host'] = $b['host'];
    if ( isset( $b['port'] ) ) $r['port'] = $b['port'];
    if ( isset( $b['user'] ) ) $r['user'] = $b['user'];
    if ( isset( $b['pass'] ) ) $r['pass'] = $b['pass'];
 
    // If relative URL has no path, use base path
    if ( empty( $r['path'] ) )
    {
        if ( !empty( $b['path'] ) )
            $r['path'] = $b['path'];
        if ( !isset( $r['query'] ) && isset( $b['query'] ) )
            $r['query'] = $b['query'];
        return join_url( $r );
    }
 
    // If relative URL path doesn't start with /, merge with base path
    if ( $r['path'][0] != '/' )
    {
        $base = mb_strrchr( $b['path'], '/', TRUE, 'UTF-8' );
        if ( $base === FALSE ) $base = '';
        $r['path'] = $base . '/' . $r['path'];
    }
    $r['path'] = url_remove_dot_segments( $r['path'] );
    return join_url( $r );
}


/**
 * Copyright (c) 2008, David R. Nadeau, NadeauSoftware.com.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *	* Redistributions of source code must retain the above copyright
 *	  notice, this list of conditions and the following disclaimer.
 *
 *	* Redistributions in binary form must reproduce the above
 *	  copyright notice, this list of conditions and the following
 *	  disclaimer in the documentation and/or other materials provided
 *	  with the distribution.
 *
 *	* Neither the names of David R. Nadeau or NadeauSoftware.com, nor
 *	  the names of its contributors may be used to endorse or promote
 *	  products derived from this software without specific prior
 *	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY
 * WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY
 * OF SUCH DAMAGE.
 */

/*
 * This is a BSD License approved by the Open Source Initiative (OSI).
 * See:  http://www.opensource.org/licenses/bsd-license.php
 */


/**
 * This function parses an absolute or relative URL and splits it
 * into individual components.
 *
 * RFC3986 specifies the components of a Uniform Resource Identifier (URI).
 * A portion of the ABNFs are repeated here:
 *
 *	URI-reference	= URI
 *			/ relative-ref
 *
 *	URI		= scheme ":" hier-part [ "?" query ] [ "#" fragment ]
 *
 *	relative-ref	= relative-part [ "?" query ] [ "#" fragment ]
 *
 *	hier-part	= "//" authority path-abempty
 *			/ path-absolute
 *			/ path-rootless
 *			/ path-empty
 *
 *	relative-part	= "//" authority path-abempty
 *			/ path-absolute
 *			/ path-noscheme
 *			/ path-empty
 *
 *	authority	= [ userinfo "@" ] host [ ":" port ]
 *
 * So, a URL has the following major components:
 *
 *	scheme
 *		The name of a method used to interpret the rest of
 *		the URL.  Examples:  "http", "https", "mailto", "file'.
 *
 *	authority
 *		The name of the authority governing the URL's name
 *		space.  Examples:  "example.com", "user@example.com",
 *		"example.com:80", "user:password@example.com:80".
 *
 *		The authority may include a host name, port number,
 *		user name, and password.
 *
 *		The host may be a name, an IPv4 numeric address, or
 *		an IPv6 numeric address.
 *
 *	path
 *		The hierarchical path to the URL's resource.
 *		Examples:  "/index.htm", "/scripts/page.php".
 *
 *	query
 *		The data for a query.  Examples:  "?search=google.com".
 *
 *	fragment
 *		The name of a secondary resource relative to that named
 *		by the path.  Examples:  "#section1", "#header".
 *
 * An "absolute" URL must include a scheme and path.  The authority, query,
 * and fragment components are optional.
 *
 * A "relative" URL does not include a scheme and must include a path.  The
 * authority, query, and fragment components are optional.
 *
 * This function splits the $url argument into the following components
 * and returns them in an associative array.  Keys to that array include:
 *
 *	"scheme"	The scheme, such as "http".
 *	"host"		The host name, IPv4, or IPv6 address.
 *	"port"		The port number.
 *	"user"		The user name.
 *	"pass"		The user password.
 *	"path"		The path, such as a file path for "http".
 *	"query"		The query.
 *	"fragment"	The fragment.
 *
 * One or more of these may not be present, depending upon the URL.
 *
 * Optionally, the "user", "pass", "host" (if a name, not an IP address),
 * "path", "query", and "fragment" may have percent-encoded characters
 * decoded.  The "scheme" and "port" cannot include percent-encoded
 * characters and are never decoded.  Decoding occurs after the URL has
 * been parsed.
 *
 * Parameters:
 * 	url		the URL to parse.
 *
 * 	decode		an optional boolean flag selecting whether
 * 			to decode percent encoding or not.  Default = TRUE.
 *
 * Return values:
 * 	the associative array of URL parts, or FALSE if the URL is
 * 	too malformed to recognize any parts.
 */
function split_url( $url, $decode=TRUE )
{
	// Character sets from RFC3986.
	$xunressub     = 'a-zA-Z\d\-._~\!$&\'()*+,;=';
	$xpchar        = $xunressub . ':@%';

	// Scheme from RFC3986.
	$xscheme        = '([a-zA-Z][a-zA-Z\d+-.]*)';

	// User info (user + password) from RFC3986.
	$xuserinfo     = '((['  . $xunressub . '%]*)' .
	                 '(:([' . $xunressub . ':%]*))?)';

	// IPv4 from RFC3986 (without digit constraints).
	$xipv4         = '(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})';

	// IPv6 from RFC2732 (without digit and grouping constraints).
	$xipv6         = '(\[([a-fA-F\d.:]+)\])';

	// Host name from RFC1035.  Technically, must start with a letter.
	// Relax that restriction to better parse URL structure, then
	// leave host name validation to application.
	$xhost_name    = '([a-zA-Z\d-.%]+)';

	// Authority from RFC3986.  Skip IP future.
	$xhost         = '(' . $xhost_name . '|' . $xipv4 . '|' . $xipv6 . ')';
	$xport         = '(\d*)';
	$xauthority    = '((' . $xuserinfo . '@)?' . $xhost .
		         '?(:' . $xport . ')?)';

	// Path from RFC3986.  Blend absolute & relative for efficiency.
	$xslash_seg    = '(/[' . $xpchar . ']*)';
	$xpath_authabs = '((//' . $xauthority . ')((/[' . $xpchar . ']*)*))';
	$xpath_rel     = '([' . $xpchar . ']+' . $xslash_seg . '*)';
	$xpath_abs     = '(/(' . $xpath_rel . ')?)';
	$xapath        = '(' . $xpath_authabs . '|' . $xpath_abs .
			 '|' . $xpath_rel . ')';

	// Query and fragment from RFC3986.
	$xqueryfrag    = '([' . $xpchar . '/?' . ']*)';

	// URL.
	$xurl          = '^(' . $xscheme . ':)?' .  $xapath . '?' .
	                 '(\?' . $xqueryfrag . ')?(#' . $xqueryfrag . ')?$';


	// Split the URL into components.
	if ( !preg_match( '!' . $xurl . '!', $url, $m ) )
		return FALSE;

	if ( !empty($m[2]) )		$parts['scheme']  = strtolower($m[2]);

	if ( !empty($m[7]) ) {
		if ( isset( $m[9] ) )	$parts['user']    = $m[9];
		else			$parts['user']    = '';
	}
	if ( !empty($m[10]) )		$parts['pass']    = $m[11];

	if ( !empty($m[13]) )		$h=$parts['host'] = $m[13];
	else if ( !empty($m[14]) )	$parts['host']    = $m[14];
	else if ( !empty($m[16]) )	$parts['host']    = $m[16];
	else if ( !empty( $m[5] ) )	$parts['host']    = '';
	if ( !empty($m[17]) )		$parts['port']    = $m[18];

	if ( !empty($m[19]) )		$parts['path']    = $m[19];
	else if ( !empty($m[21]) )	$parts['path']    = $m[21];
	else if ( !empty($m[25]) )	$parts['path']    = $m[25];

	if ( !empty($m[27]) )		$parts['query']   = $m[28];
	if ( !empty($m[29]) )		$parts['fragment']= $m[30];

	if ( !$decode )
		return $parts;
	if ( !empty($parts['user']) )
		$parts['user']     = rawurldecode( $parts['user'] );
	if ( !empty($parts['pass']) )
		$parts['pass']     = rawurldecode( $parts['pass'] );
	if ( !empty($parts['path']) )
		$parts['path']     = rawurldecode( $parts['path'] );
	if ( isset($h) )
		$parts['host']     = rawurldecode( $parts['host'] );
	if ( !empty($parts['query']) )
		$parts['query']    = rawurldecode( $parts['query'] );
	if ( !empty($parts['fragment']) )
		$parts['fragment'] = rawurldecode( $parts['fragment'] );
	return $parts;
}

function url_remove_dot_segments( $path )
{
    // multi-byte character explode
    $inSegs  = preg_split( '!/!u', $path );
    $outSegs = array( );
    foreach ( $inSegs as $seg )
    {
        if ( $seg == '' || $seg == '.')
            continue;
        if ( $seg == '..' )
            array_pop( $outSegs );
        else
            array_push( $outSegs, $seg );
    }
    $outPath = implode( '/', $outSegs );
    if ( $path[0] == '/' )
        $outPath = '/' . $outPath;
    // compare last multi-byte character against '/'
    if ( $outPath != '/' &&
        (mb_strlen($path)-1) == mb_strrpos( $path, '/', 'UTF-8' ) )
        $outPath .= '/';
    return $outPath;
}

/**
 * Copyright (c) 2008, David R. Nadeau, NadeauSoftware.com.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *	* Redistributions of source code must retain the above copyright
 *	  notice, this list of conditions and the following disclaimer.
 *
 *	* Redistributions in binary form must reproduce the above
 *	  copyright notice, this list of conditions and the following
 *	  disclaimer in the documentation and/or other materials provided
 *	  with the distribution.
 *
 *	* Neither the names of David R. Nadeau or NadeauSoftware.com, nor
 *	  the names of its contributors may be used to endorse or promote
 *	  products derived from this software without specific prior
 *	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY
 * WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY
 * OF SUCH DAMAGE.
 */

/*
 * This is a BSD License approved by the Open Source Initiative (OSI).
 * See:  http://www.opensource.org/licenses/bsd-license.php
 */


/**
 * This function joins together URL components to form a complete URL.
 *
 * RFC3986 specifies the components of a Uniform Resource Identifier (URI).
 * This function implements the specification's "component recomposition"
 * algorithm for combining URI components into a full URI string.
 *
 * The $parts argument is an associative array containing zero or
 * more of the following:
 *
 *	"scheme"	The scheme, such as "http".
 *	"host"		The host name, IPv4, or IPv6 address.
 *	"port"		The port number.
 *	"user"		The user name.
 *	"pass"		The user password.
 *	"path"		The path, such as a file path for "http".
 *	"query"		The query.
 *	"fragment"	The fragment.
 *
 * The "port", "user", and "pass" values are only used when a "host"
 * is present.
 *
 * The optional $encode argument indicates if appropriate URL components
 * should be percent-encoded as they are assembled into the URL.  Encoding
 * is only applied to the "user", "pass", "host" (if a host name, not an
 * IP address), "path", "query", and "fragment" components.  The "scheme"
 * and "port" are never encoded.  When a "scheme" and "host" are both
 * present, the "path" is presumed to be hierarchical and encoding
 * processes each segment of the hierarchy separately (i.e., the slashes
 * are left alone).
 *
 * The assembled URL string is returned.
 *
 * Parameters:
 * 	parts		an associative array of strings containing the
 * 			individual parts of a URL.
 *
 * 	encode		an optional boolean flag selecting whether
 * 			to do percent encoding or not.  Default = true.
 *
 * Return values:
 * 	Returns the assembled URL string.  The string is an absolute
 * 	URL if a scheme is supplied, and a relative URL if not.  An
 * 	empty string is returned if the $parts array does not contain
 * 	any of the needed values.
 */
function join_url( $parts, $encode=TRUE )
{
	if ( $encode )
	{
		if ( isset( $parts['user'] ) )
			$parts['user']     = rawurlencode( $parts['user'] );
		if ( isset( $parts['pass'] ) )
			$parts['pass']     = rawurlencode( $parts['pass'] );
		if ( isset( $parts['host'] ) &&
			!preg_match( '!^(\[[\da-f.:]+\]])|([\da-f.:]+)$!ui', $parts['host'] ) )
			$parts['host']     = rawurlencode( $parts['host'] );
		if ( !empty( $parts['path'] ) )
			$parts['path']     = preg_replace( '!%2F!ui', '/',
				rawurlencode( $parts['path'] ) );
		if ( isset( $parts['query'] ) )
			$parts['query']    = rawurlencode( $parts['query'] );
		if ( isset( $parts['fragment'] ) )
			$parts['fragment'] = rawurlencode( $parts['fragment'] );
	}

	$url = '';
	if ( !empty( $parts['scheme'] ) )
		$url .= $parts['scheme'] . ':';
	if ( isset( $parts['host'] ) )
	{
		$url .= '//';
		if ( isset( $parts['user'] ) )
		{
			$url .= $parts['user'];
			if ( isset( $parts['pass'] ) )
				$url .= ':' . $parts['pass'];
			$url .= '@';
		}
		if ( preg_match( '!^[\da-f]*:[\da-f.:]+$!ui', $parts['host'] ) )
			$url .= '[' . $parts['host'] . ']';	// IPv6
		else
			$url .= $parts['host'];			// IPv4 or name
		if ( isset( $parts['port'] ) )
			$url .= ':' . $parts['port'];
		if ( !empty( $parts['path'] ) && $parts['path'][0] != '/' )
			$url .= '/';
	}
	if ( !empty( $parts['path'] ) )
		$url .= $parts['path'];
	if ( isset( $parts['query'] ) )
		$url .= '?' . $parts['query'];
	if ( isset( $parts['fragment'] ) )
		$url .= '#' . $parts['fragment'];
	return $url;
}


 
function insertSoftBreak($string, $interval=20, $breakChr='&shy;') {     
	$splitString = explode(' ', $string);
	foreach($splitString as $key => $val) {         
		if(strlen($val)>$interval) {             
			$splitString[$key] = wordwrap($val, $interval, $breakChr, true);
		}     
	}     
	return implode(' ', $splitString); 
}  


function cleanFileName($str) {
    $strArr=array();
    $strArr=explode(' ',$str);
    foreach ($strArr as $key=>$val) {
        if (strlen($strArr[$key])==0) {
        unset($strArr[$key]);
        }
    }
    $strArr=array_map('strtolower',$strArr);
    $str=implode(' ',$strArr);
    $str=preg_replace("/\W+/i","_",$str);

    return $str;
}


/*
    * @return string
    * @param string $url
    * @desc Return string content from a remote file
    * @author Luiz Miguel Axcar (lmaxcar@yahoo.com.br)
 */

function get_content($url)
 {
     $ch = curl_init();

     curl_setopt ($ch, CURLOPT_URL, $url);
     curl_setopt ($ch, CURLOPT_HEADER, 0);

     ob_start();

     curl_exec ($ch);
     curl_close ($ch);
     $string = ob_get_contents();

     ob_end_clean();
     
     return $string;     
 }


?>