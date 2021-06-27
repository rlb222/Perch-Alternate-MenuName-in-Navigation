# Perch-Alternate-MenuName-in-Navigation
a Perch filter to enable two MenuItem names (e.g. long and short name) in the navigation portion on your frontend.
If you want your website to show a different menu-name in different situations.

Normally the pagename will be used to show in the navigation of a website. This filter allows you to set an alternate page-name for diffent situations.
For example: Show a smaller menu-name on smaller screens.   
  
    
more information on Perch filters can be found here: [Perch Docs on field filters](https://docs.grabaperch.com/api/template-filters/)
  
    

# How it works
1. Add an alternate pagename behind the normal pagename. Like this: 'My Homepage | home'
2. Define the behaviour in your navigation template (normally perch\templates\navigation\item.html).
3. In combination with your frontend CSS. (for example the screen width defines which of the two names will be displayed).  

## Detailed explanation 

### Ad 1.   
The page name is stored in Perch in: Pages menu \ Page Details \ Navigation Text 
After the normal pagename place a pipe character and the alternate pagename. 'My HomePage' will become 'My HomePage | home'.
  
### Ad 2.  
Change the HTML to add the alternate pagename. Take the pagename (id="pageNavText") and filter it with the attribute filter="splitmenu" 
and add the choice for the first (filterpos="first") or the second pagename (filterpos="second").
  
In this example I added a class around each to be able to show or hide the first and second name in CSS.

~~~

<!-- navigation template (normally perch\templates\navigation\item.html) -->

<perch:before>
   <ul>
</perch:before>
    <li>
       <a href="<perch:pages id="pagePath" />">
        <span class="long_menu">
          <perch:pages filter="splitmenu" filterpos="first" id="pageNavText" />
        </span>
        <span class="short_menu">
          <perch:pages filter="splitmenu" filterpos="second" id="pageNavText" />
        </span>
       </a>   
    </li>
<perch:after>
  </ul>
</perch:after>
~~~

### Ad 3.  
The frontend CSS will determine what name to show according to screenwidth.

~~~
nav span.short_menu { display: none; }
nav span.long_menu  { display: inline; }

@media only screen and (max-width: 660px) {
  nav span.short_menu { display: inline; }
  nav span.long_menu  { display: none; } 
 }
~~~


# Installation
1. Download the filter and add it to your perch\addons\templates\filters directory
2. Add this filters filename to your perch\addons\templates\filters.php
~~~
<?php 
    include('filters/rlb_splitmenu.class.php'); 
~~~
3. Make sure Perch will use filters and add this to the Perch config file
~~~
 // perch/config/config.php 
 
 // Add this line ad the bottom somewhere of the perch config.php
 // Use the Perch filters 
    define('PERCH_TEMPLATE_FILTERS', true);
~~~    



4. Use the filter like described in (Ad 2. and Ad 3.)  
To get the contents of the field before the pipe character (|)  
`<perch:pages filter="splitmenu" filterpos="first" id="pageNavText" />`  
To get the contents of the field after the pipe character (|)    
`<perch:pages filter="splitmenu" filterpos="second" id="pageNavText" />`  
  
  

