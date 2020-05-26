<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
      <li><a><i class="fa fa-home"></i> गृहपृष्ठ <span class="fa fa-chevron"></span></a>
      </li>
      <li><a><i class="fa fa-home"></i>  Slider <span class="fa fa-chevron-down"></span></a>              
        <ul class="nav child_menu">
          <li><a href="{{route('admin.sliders.create')}}">नयाँ  थप्नुहोस</a></li>
          <li><a href="{{route('admin.sliders.index')}}">सबै Slider</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-binoculars"></i> हाम्रो बारेमा <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a  href="{{route('admin.getAbout')}}">परिचय</a></li>
          <li><a  href="{{route('admin.getUnderneath')}}">कार्यालय अन्तर्गतका निकायहरू</a></li>

          <li><a>कर्मचारी विवरण<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('admin.staff.create')}}">नयाँ थप्नुहोस</a></li>
              <li><a href="{{route('admin.staff.index')}}">सबै सेवाहरु</a></li>
            </ul>
          </li>


          <li><a  href="{{route('admin.getCitizenCharter')}}">नागरिक बडापत्र</a></li>
        <li><a>सेवाहरु<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('admin.service.create')}}">नयाँ थप्नुहोस</a></li>
              <li><a href="{{route('admin.service.index')}}">सबै सेवाहरु</a></li>
            </ul>
          </li>

        </ul>
      </li>
       <li><a href="{{route('admin.getPolicyProgram')}}"><i class="fa fa-home"></i> नीति तथा कार्यक्रम <span class="fa fa-chevron"></span></a>
      </li>
        <li><a><i class="fa fa-home"></i>   ऐन तथा नियमावली <span class="fa fa-chevron-down"></span></a>              
          <ul class="nav child_menu">
            <li><a href="{{route('admin.act_and_regulation.create')}}">नयाँ  थप्नुहोस</a></li>
            <li><a href="{{route('admin.act_and_regulation.index')}}">सबै ऐन तथा नियमावली </a></li>
          </ul>
        </li>

      <li><a><i class="fa fa-home"></i> मिडिया सेन्टर <span class="fa fa-chevron-down"></span></a>              
        <ul class="nav child_menu">
          <li><a href="form.html">सूचना</a></li>
          <li><a href="form_advanced.html">सूचनाको हक</a></li>
          <li><a href="form_validation.html">प्रेश विज्ञप्ति</a></li>
          <li><a href="form_wizards.html">समाचार</a></li>
          <li><a href="form_upload.html">बोलपत्र</a></li>
          <li><a href="form_buttons.html">परिपत्र</a></li>
        </ul>
      </li>
     <li><a><i class="fa fa-home"></i> क्रियाकलापहरू <span class="fa fa-chevron"></span></a></li>
    
      <li><a><i class="fa fa-envelope"></i>  हुलाक दर <span class="fa fa-chevron-down"></span></a>              
        <ul class="nav child_menu">
          <li><a href="{{route('admin.postal_rates.create')}}">नयाँ  थप्नुहोस</a></li>
          <li><a href="{{route('admin.postal_rates.index')}}">सबै हुलाक दर </a></li>
        </ul>
      </li>

     <li>
      <a href="{{route('admin.getContact')}}"><i class="fa fa-phone"></i> सम्पर्क गर्नुहोस <span class="fa fa-chevron"></span></a>
    </li>


     <li><a><i class="fa fa-home"></i> Settings<span class="fa fa-chevron"></span></a></li>
    
    </ul>
  </div>

</div>

