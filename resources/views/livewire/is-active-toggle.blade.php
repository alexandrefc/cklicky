<div>
  {{-- <style>
    /* CHECKBOX TOGGLE SWITCH */
    /* @apply rules for documentation, these do not work as inline style */
    .toggle-checkbox:checked {
      @apply: right-0 border-green-400;
      right: 0;
      border-color: #68D391;
    }
    .toggle-checkbox:checked + .toggle-label {
      @apply: bg-green-400;
      background-color: #68D391;
    }
    /* .toggle-checkbox:checked {
      @apply: right-0 border-green-400;
      right: 0;
      border-color: #68D391;
    }
    .toggle-checkbox:checked + .toggle-label {
      @apply: bg-green-400;
      background-color: #68D391;
    } */

    /* Toggle Button */
.cm-toggle {
	-webkit-appearance: none;
	-webkit-tap-highlight-color: transparent;
	position: relative;
	border: 0;
	outline: 0;
	cursor: pointer;
	margin: 10px;
}

/* To create surface of toggle button */
.cm-toggle:after {
	content: '';
	width: 60px;
	height: 28px;
	display: inline-block;
	background: rgba(196, 195, 195, 0.55);
	border-radius: 18px;
	clear: both;
}

/* Contents before checkbox to create toggle handle */
.cm-toggle:before {
	content: '';
	width: 32px;
	height: 32px;
	display: block;
	position: absolute;
	left: 0;
	top: -3px;
	border-radius: 50%;
	background: rgb(255, 255, 255);
	box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6);
}

/* Shift the handle to left on check event */
.cm-toggle:checked:before {
	left: 32px;
	box-shadow: -1px 1px 3px rgba(0, 0, 0, 0.6);
}
/* Background color when toggle button will be active */
.cm-toggle:checked:after {
	background: #16a085;
}
/* Transition for smoothness */
.cm-toggle,
.cm-toggle:before,
.cm-toggle:after,
.cm-toggle:checked:before,
.cm-toggle:checked:after {
	transition: ease .3s;
	-webkit-transition: ease .3s;
	-moz-transition: ease .3s;
	-o-transition: ease .3s;
} --}}
{{-- .onoffswitch {
    position: relative; 
    width: 115px;
    -webkit-user-select:none;
     -moz-user-select:none; 
     -ms-user-select: none;
}
.onoffswitch-checkbox {
    display: none;
}
.onoffswitch-label {
    display: block; 
    overflow: hidden; 
    cursor: pointer;
    border: 2px solid #999999;
     border-radius: 50px;
}
.onoffswitch-inner {
    display: block; 
    width: 200%; 
    margin-left: -100%;
    transition: margin 0.3s ease-in 0s;
}
.onoffswitch-inner:before, 
.onoffswitch-inner:after {
    display: block; 
    float: left; 
    width: 50%; 
    height: 35px; 
    padding: 0; 
    line-height: 35px;
    font-size: 15px; 
    color: white; 
    font-family: Trebuchet, Arial, sans-serif; 
    font-weight: bold;
    box-sizing: border-box;
}
.onoffswitch-inner:before {
    content: "Active";
    padding-left: 12px;
    background-color: #34A7C1; color: #FFFFFF;
}
.onoffswitch-inner:after {
    content: "Disabled";
    padding-right: 12px;
    background-color: ; color: #999999;
    text-align: right;
}
.onoffswitch-switch {
    display: block; 
    width: 14px;
     margin: 10.5px;
    background: #FFFFFF;
    position: absolute; 
    top: 0; bottom: 0;
    right: 76px;
    border: 2px solid #999999; border-radius: 50px;
    transition: all 0.3s ease-in 0s; 
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
    margin-left: 0;
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
    right: 0px; 
}
    </style> --}}

{{-- <style>
  #sliderLabel {
      border: 1px solid #a2a2a2;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      border-radius: 3px;
      cursor: pointer;
      display: block;
      height: 30px;
      overflow: hidden;
      position: relative;
      width: 100px;
      display: inline-block;
  }
  
  #sliderLabel input {
      display: none;
  }
  
  #sliderLabel input:checked + #slider {
      left: 0px;
  }
  
  #slider {
      left: -50px;
      position: absolute;
      top: 0px;
      -webkit-transition: left .25s ease-out;
      -moz-transition: left .25s ease-out;
      -o-transition: left .25s ease-out;
      -ms-transition: left .25s ease-out;
      transition: left .25s ease-out;
  }
  
  #sliderOn,
  #sliderBlock,
  #sliderOff {
      display: block;
      font-family: arial, verdana, sans-serif;
      font-weight: bold;
      height: 30px;
      line-height: 30px;
      position: absolute;
      text-align: center;
      top: 0px;
  }
  
  #sliderOn {
      background: #3269aa;
      background: -webkit-linear-gradient(top, #3269aa 0%, #82b3f4 100%);
      background: -moz-linear-gradient(top, #3269aa 0%, #82b3f4 100%);
      background: -o-linear-gradient(top, #3269aa 0%, #82b3f4 100%);
      background: -ms-linear-gradient(top, #3269aa 0%, #82b3f4 100%);
      background: linear-gradient(top, #3269aa 0%, #82b3f4 100%);
      color: white;
      left: 0px;
      width: 54px;
  }
  
  #sliderBlock {
      background: #d9d9d8;
      background: -webkit-linear-gradient(top, #d9d9d8 0%, #fcfcfc 100%);
      background: -moz-linear-gradient(top, #d9d9d8 0%, #fcfcfc 100%);
      background: -o-linear-gradient(top, #d9d9d8 0%, #fcfcfc 100%);
      background: -ms-linear-gradient(top, #d9d9d8 0%, #fcfcfc 100%);
      background: linear-gradient(top, #d9d9d8 0%, #fcfcfc 100%);
      border: 1px solid #a2a2a2;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      border-radius: 3px;
      height: 28px;
      left: 50px;
      width: 50px;
  }
  
  #sliderOff {
      background: #f2f3f2;
      background: -webkit-linear-gradient(top, #8b8c8b 0%, #f2f3f2 50%);
      background: -moz-linear-gradient(top, #8b8c8b 0%, #f2f3f2 50%);
      background: -o-linear-gradient(top, #8b8c8b 0%, #f2f3f2 50%);
      background: -ms-linear-gradient(top, #8b8c8b 0%, #f2f3f2 50%);
      background: linear-gradient(top, #8b8c8b 0%, #f2f3f2 50%);
      color: #8b8b8b;
      left: 96px;
      width: 54px;
  }
  </style> --}}

<style>
  .tgl {
      position: relative;
      outline: 0;
      display: inline-block;
      cursor: pointer;
      user-select: none;
      margin: 0 0 5px 0;
  }
  .tgl,
  .tgl:after,
  .tgl:before,
  .tgl *,
  .tgl *:after,
  .tgl *:before,
  .tgl + .tgl-btn {
      box-sizing: border-box;
  }
  .tgl::selection,
  .tgl:after::selection,
  .tgl:before::selection,
  .tgl *::selection,
  .tgl *:after::selection,
  .tgl *:before::selection,
  .tgl + .tgl-btn::selection {
      background: none;
  }
  .tgl span {
      position: relative;
      display: block;
      height: 1.1em;
      width: 5em;
      line-height: 0.8em;
      overflow: hidden;
      /* font-weight: bold; */
      text-align: center;
      border-radius: 2em;
      padding: 0.2em 0.8em;
      border: 1px solid #fafafa;
      /* box-shadow: inset 0 2px 0 rgba(0, 0, 0, 0.2), 0 2px 0 rgba(255, 255, 255, 0.7); */
      transition: color 0.3s ease, padding 0.3s ease-in-out, background 0.3s ease-in-out;
  }
  .tgl span:before {
      position: relative;
      display: block;
      line-height: 1em;
      padding: 0 0.2em;
      font-size: 0.6em;
  }
  .tgl span:after {
      position: absolute;
      display: block;
      content: '';
      border-radius: 2em;
      width: 0.6em;
      height: 0.6em;
      margin-left: -1.05em;
      top: 0.2em;
      background: #FFFFFF;
      transition: left 0.4s cubic-bezier(0.175, 0.885, 0.32, 0.97), background 0.4s ease-in-out;
  }
  .tgl input[type="checkbox"] {
      display: none !important;
  }
  .tgl input[type="checkbox"]:not(:checked) + span {
      background: #D1D5DB;
      color: #FFFFFF;
      padding-left: 1.6em;
      padding-right: 0.4em;
  }
  .tgl input[type="checkbox"]:not(:checked) + span:before {
      content: attr(data-off);
      color: #FFFFFF;
  }
  .tgl input[type="checkbox"]:not(:checked) + span:after {
      background: #FFFFFF;
      left: 1.6em;
  }
  .tgl input[type="checkbox"]:checked + span {
      background: #86d993;
      color: #FFFFFF;
      padding-left: 0.4em;
      padding-right: 1.6em;
  }
  .tgl input[type="checkbox"]:checked + span:before {
      content: attr(data-on);
  }
  .tgl input[type="checkbox"]:checked + span:after {
      background: #FFFFFF;
      left: 100%;
  }
  .tgl input[type="checkbox"]:disabled,
  .tgl input[type="checkbox"]:disabled + span,
  .tgl input[type="checkbox"]:read-only,
  .tgl input[type="checkbox"]:read-only + span {

  }
  /* .tgl-gray input[type="checkbox"]:not(:checked) + span {
      background: #e3e3e3;
      color: #999999;
  }
  .tgl-gray input[type="checkbox"]:not(:checked) + span:before {
      color: #999999;
  }
  .tgl-gray input[type="checkbox"]:not(:checked) + span:after {
      background: #ffffff;
  } */
  .tgl-inline {
      display: inline-block !important;
      vertical-align: top;
  }
  .tgl-inline.tgl {
      font-size: 16px;
  }
  .tgl-inline.tgl span {
      min-width: 50px;
  }
  .tgl-inline.tgl span:before {
      line-height: 1em;
      padding-left: 0.4em;
      padding-right: 0.4em;
  }
  .tgl-inline-label {
      display: inline-block !important;
      vertical-align: top;
      line-height: 26px;
  }
  /* body {
      background: url(https://www.html-code-generator.com/images/checkbox/208.png);
      font-family: 'Source Sans Pro', Helvetica Neue, Helvetica, Arial, sans-serifsans !important;
  } */
  /* .simple-toggle {
      position: absolute;
      left: 0;
      right: 0;
      top: 30px;
      text-align: center;
      margin: auto;
  } */
  /* .title,
  .subtitle {
      display: block;
      -webkit-font-smoothing: antialiased !important;
      text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
  }
  .title {
      font-size: 30px;
      line-height: 40px;
      font-weight: bold;
      color: #262626;
  }
  .subtitle {
      margin-bottom: 20px;
      opacity: 0.4;
  } */
  /* .code {
      display: inline-block;
      color: grey;
      border-radius: 5px;
      border: 1px solid #c9c9c9;
      background-color: #d6d6d6;
      margin: 10px;
      text-align: left;
      padding: 10px 10px 0 0;
      line-height: 0.6em;
      max-width: 300px;
  } */
  /* .footer {
      margin-top: 30px;
      font-size: 14px;
      opacity: 0.4;
  } */
  </style>
  
  <div class="text-center text-xs">
    <div class="simple-toggle">
      <label class="tgl" style="font-size:30px">
      <input type="checkbox" wire:model.lazy="active" checked>
      <span data-on="Active" data-off="Disabled"></span>
      </label>
    </div>
  </div>





  
  {{-- <div style="text-align: center;margin-top:10%">
    <label id="sliderLabel">
        <input type="checkbox" wire:model.lazy="active"/>
        <span id="slider">
        <span id="sliderOn">Active</span>
        <span id="sliderOff">Disabled</span>
        <span id="sliderBlock"></span>
        </span>
    </label>
  </div> --}}

  






  {{-- <div>
    <input type="checkbox" name="checkbox" class="cm-toggle">
  </div>
   --}}

    {{-- <div class="relative inline-block w-3/4 mr-2 align-middle select-none transition duration-200 ease-in">
        
        <input wire:model.lazy="active" type="checkbox" name="active" id="active" role="switch"
              class="toggle-checkbox absolute block w-8 h-6  bg-white rounded-full border-4 appearance-none cursor-pointer"
        />

        <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer">
          @if ($active)
          Active
          @else
          Disabled  
          @endif
        </label>
        
    </div> --}}

    {{-- <div class="onoffswitch">
      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
      <label class="onoffswitch-label" for="myonoffswitch">
          <span class="onoffswitch-inner"></span>
          <span class="onoffswitch-switch"></span>
      </label>
  </div> --}}
</div>


    