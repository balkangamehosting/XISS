<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Pagination
 *
 * Handles pages
 *
 */
class Pagination extends API 
{	
	# How many entries per page
	protected $per_page = 20;
	# Label for page interception (language based)
	protected $lang_arg = 'page';
	# Pages to show in navigation
	protected $display_pages = 6;
	# Offset pages
	protected $offset = false;

	/**
	 * Parse any variables
	 * 
	 * @param integer $per_page
	 * @param integer $display_pages
	 * @param string $lang_arg
	 */
	public function __construct($per_page='', $display_pages='',$offset=false)
	{
		if ($per_page)
			$this->per_page = $per_page;
		
		if ($display_pages)
			$this->display_pages = $display_pages;
		
		if ($offset)
			$this->offset = $offset;
		
		$this->lang_arg = $this->language('PAGE');
		
		# We need parent variables
		parent::__construct();
	}
	
	/**
	 * Offsets limit
	 * 
	 * @param string $arg 
	 * @param intger $page
	 * @return string
	 */
	public function limit($arg, $page, $total)
	{	
		if ($arg == $this->lang_arg)
		{
			$page = (int)$page;
			
			# If it's a value and it's bigger then 1
			if ($page && $page > 1)
			{
				$count = ceil($total / $this->per_page);
				$offset = ($page - 1) * $this->per_page;
				
				# If manually entered, it will always show last set
				if ($page > $count)
					return " LIMIT " . (($count - 1) * $this->per_page). ", " . $this->per_page;
				# If manually entered it will always show first set
				elseif ($page < 1)
					return " LIMIT " . $this->per_page;
				# Seems legit, offset it
				else
					return " LIMIT " . $offset . ", " . $this->per_page;
			}
			else
			{	
				return " LIMIT " . $this->per_page;
			}
		}
		else
		{
			return " LIMIT " . $this->per_page;
		}
	}
	
	/**
	 * Builds layout for pagination 
	 * 
	 * @param integer $total Total entries 
	 * @param string $arg Name of what to catch for a match
	 * @param integer $per_page How many entries per page (keep in sync with limit...)
	 */
	public function layout($total) 
	{
		$total = @ceil($total / $this->per_page);
			
		# Don't show this is there's no pages to show..
		if ($total < 2)
			return;	
				
		# Check offset 
		# NOTE - May need to modify this to support deep nesting..time will tell.
		if ($this->offset)
			$page = @(int)$this->params[2];
		else
			$page = @(int)$this->params[1];
		
		if (!$page)
			$page = 1;	
		
		# Build URL - Script Path / Module / Function / LANG (page) 
		$url = $this->url.$this->controller.'/'.$this->function.'/'.
			# Sometimes we need to offset it as param0 is used as a call..
			($this->offset ? $this->params[0].'/'.$this->lang_arg : $this->lang_arg)
				.'/';
				
		# Fix overlapping of pages
		if ($page > $total)
			$page = $total;
		elseif ($page < 1)
			$page = 1;
		
		# Only styling that's hardcoded ^^
		$output = '<div class="pagination">';
		
		# Start	
		if ($page>1)
			$output .= '<a href="'.$url.'" class="page gradient">&laquo; '.$this->language('FIRST').' </a></li>';
		
		# Previous
		if ($page>1)			
			$output .= '<a href="'.$url.($page-1).'" class="page gradient">'.$this->language('PREVIOUS').'</a>';
		
		# Pages
		for ($i = $page; $i <= $total && $i<=($page+$this->display_pages); $i++) 
		{
			if ($i == $page)				
				$output .= '<span class="page active">'.$i.'</span>';
			else				
				$output .= '<a href="'.$url.$i .'" class="page gradient">'. $i .'</a>';
		}
		
		# Divider
		if (($page+$this->display_pages)< $total)			
			$output .= '<a href="'.$url.($page+1+$this->display_pages).'" class="page gradient">...</a>';
		
		# Next
		if ($page<$total)			
			$output .= '<a href="'.$url.($page+1).'" class="page gradient">'.$this->language('NEXT').'</a>';
		
		# End
		if ($page<$total)
			$output .= '<a href="'.$url.$total.'" class="page gradient">'.$this->language('LAST').' &raquo;</a>';
		
		# Pages available
		$output .= '<span class="right color_dark">					
					'.$this->language('SHOWING_PAGES', array($page, $total)).'
					</span>';
		
		# End styling
		$output .= '</div>';
		
		return $output;
	}
}