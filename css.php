
<?php  ?>
<div class="mustache-solid icon"></div>
<style>
.mustache-solid.icon {
  color: #000;
  position: absolute;
  width: 6px;
  height: 6px;
  border-radius: 50%;
  box-shadow: 5px 8px 0 0 currentColor,  10px 8px 0 0 currentColor;
}
.mustache-solid.icon:before {
  content: '';
  position: absolute;
  left: 1px;
  top: 4px;
  width: 7px;
  height: 4px;
  border-radius: 0 0 0 100%;
  border: 0 solid transparent;
  border-bottom: 6px solid currentColor;
  -webkit-transform-origin: right 7px;
          transform-origin: right 7px;
  -webkit-transform: rotate(-40deg);
          transform: rotate(-40deg);
}
.mustache-solid.icon:after {
  content: '';
  position: absolute;
  width: 7px;
  height: 4px;
  left: 13px;
  top: 4px;
  border-radius: 0 0 100% 0;
  border: 0 solid transparent;
  border-bottom: 6px solid currentColor;
  -webkit-transform-origin: left 7px;
          transform-origin: left 7px;
  -webkit-transform: rotate(40deg);
          transform: rotate(40deg);
}
</style>