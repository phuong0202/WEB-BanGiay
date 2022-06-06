<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="bootstrap/js/BsMultiSelect.js"></script>
<select name="states" id="example" class="form-control"  multiple="multiple" style="display: none;">
  <option value="AL">Alabama</option>
  <option value="AK">Alaska</option>
  <option value="AZ">Arizona</option>
  <option value="AR">Arkansas</option>
  <option selected value="CA">California</option>
  ...
</select>
<form>
  <div class="checkbox">
    <input type="checkbox" value="Nike">Nike
  </div>
  <div class="checkbox">
    <input type="checkbox" value="Adidas">Adidas
  </div>
  <div class="checkbox">
    <input type="checkbox" value="Asics">Asics
  </div>
</form>
<?php
$("select").bsMultiSelect({
  items: [], // an array of items for dynamic rendering
  defaults: [], 
  selectedPanelMinHeight: "calc(2.25rem + 2px)",
  selectedPanelReadonlyBackgroundColor: "#e9ecef",
  selectedPanelValidBoxShadow: " 0 0 0 0.2rem rgba(40, 167, 69, 0.25)",
  selectedPanelInvalidBoxShadow: "0 0 0 0.2rem rgba(220, 53, 69, 0.25)",
  filterInputColor: "#495057",
  containerClass: "dashboardcode-bsmultiselect",
  dropDown<a href="https://www.jqueryscript.net/menu/">Menu</a>Class: "dropdown-menu",
  dropDownItemClass: "px-2",
  selectedPanelClass: "form-control btn border",
  selectedPanelStyle: {
    "min-height": "calc(2.25rem + 2px)"
  },
  selectedPanelStyleSys: {
    "cursor": "text",
    "display": "flex",
    "flex-wrap": "wrap",
    "align-items": "center",
    "margin-bottom": "0px"
  },
  selectedPanelReadonlyStyle: {
    "background-color": "#e9ecef"
  },
  selectedItemClass: "badge",
  selectedItemStyle: {
    "padding-left": "0px"
  },
  selectedItemStyleSys: {
    "display": "flex",
    "align-items": "center"
  },
  removeSelectedItemButtonClass: "close",
  removeSelectedItemButtonStyle: {
    "font-size": "100%"
  },
  filterInputItemClass: "",
  filterInputItemStyle: {},
  filterInputItemStyleSys: {
    "display": "block"
  },
  filterInputClass: "",
  filterInputStyle: {
    "color": "#495057"
  },
  filterInputStyleSys: {
    "width": "2ch",
    "border": "0",
    "padding": "0",
    "outline": "none"
  }
}); ?>