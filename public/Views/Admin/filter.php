
<div class="row" id="filters">
    <div class="col-lg-9 panel">
        <form id="myFilter">
            <div class="col-lg-1">
                <button type="button" id="resetTag" class="btn btn-primary btn-tiny"  onClick=this.form.reset() type="reset">reset criteria</button>
            </div>
            <div class="col-md-2">
                <div>
                    <input type="text" id="textBox" placeholder="keyword">
                    <button type="button" class="btn btn-primary btn-tiny"  onClick=addTag("textBox")>add criteria</button>
                </div>
            </div>

            <div class="col-lg-2">
                <div>
                    <label>By division</label>
                    <div class="radio">
                        <label><input type="radio" value="AHSS" name="optradio" onclick=isChecked(this.value) >AHSS</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio"  value="HHS" name="optradio" onclick=isChecked(this.value)>HHS</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" value="BTS" name="optradio" onclick=isChecked(this.value)>BTS</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" value="BEIT" name="optradio" onclick=isChecked(this.value)>BEIT</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" value="LIB" name="optradio" onclick=isChecked(this.value)>LIB</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio"  value="M&amp;S" name="optradio" onclick=isChecked(this.value)>M&amp;S</label>
                    </div>
                    <button type="button" class="btn btn-primary btn-tiny"  onClick=addTag("radio")>add criteria</button></div>
            </div>
            <div class="col-lg-2">
                <div>
                    <label for="sel1">By Academic year:</label>
                    <select class="form-control" id="quartlydate">
                        <option>date</option>
                        <option>3/5/14</option>
                        <option>4/6/15</option>
                        <option>6/4/16</option>
                    </select>
                    <button type="button" class="btn btn-primary btn-tiny"  onClick=addTag("date")>add criteria</button>
                </div>
            </div>
            <div class="col-lg-2">
                <div>
                    <label for="sel1">Learning Outcome</label>
                    <select class="form-control" id="learnOutcome">
                        <option>learning outcome</option>
                        <option>learning outcome2</option>
                        <option>learning outcome3</option>
                        <option>learning outcome4</option>
                    </select>
                    <button type="button" class="btn btn-primary btn-tiny"  onClick=addTag("outcome")>add criteria</button></div>
            </div>
            <div class="col-lg-2">
                <div>
                    <label for="sel1">Question</label>
                    <select  class="form-control" id="questions">
                        <option>question</option>
                        <option>question2</option>
                        <option>question3</option>
                        <option>question4</option>
                    </select>
                    <button type="button" class="btn btn-primary btn-tiny" onClick=addTag("question")>add criteria</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-lg-10">

        <div id="tagDiv">
        </div>
    </div>
    <div class="col-md-2">
        <button type="button"  class="btn btn-primary btn-tiny" onClick=clearTags() style="align:right" type="reset">clear tags</button>
    </div>
</div>
<script>

</script>
