        
            <div class="col-md-10">
                
                <div class="block">
                    <div class="header">
                        <h2>Default elements</h2>
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-3">Text:</div>
                            <div class="col-md-9"><input type="text" class="form-control" value="text value"/></div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Password:</div>
                            <div class="col-md-9"><input type="password" class="form-control" value="password value"/></div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Readonly:</div>
                            <div class="col-md-9"><input type="text" readonly="readonly" class="form-control" value="Some readonly value"/></div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Disabled:</div>
                            <div class="col-md-9"><input type="text" disabled="disabled" class="form-control" value="Some disabled value"/></div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Placeholder:</div>
                            <div class="col-md-9"><input type="text" class="form-control" placeholder="Placeholder"/></div>
                        </div>                                        
                        <div class="form-row">
                            <div class="col-md-3">Textarea:</div>
                            <div class="col-md-9"><textarea class="form-control">textarea value</textarea></div>
                        </div>                        
                        <div class="form-row">
                            <div class="col-md-3">Default:</div>
                            <div class="col-md-9">
                                <select class="form-control">
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Multiple:</div>
                            <div class="col-md-9">
                                <select class="form-control" multiple="multiple">
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                </select>
                            </div>
                        </div>                        
                    </div>
                </div>                
                
                <div class="block">
                    <div class="header">
                        <h2>Checkbox, radio and file fields</h2>
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-3">Checkbox:</div>
                            <div class="col-md-9">
                                <div class="checkbox-inline">
                                    <label><input type="checkbox" name="check_ex1"/> Default</label>
                                </div>
                                <div class="checkbox-inline">
                                    <label><input type="checkbox" name="check_ex2" checked="checked"/> Checked</label>
                                </div>                                
                                <div class="checkbox-inline">
                                    <label><input type="checkbox" name="check_ex1" disabled="disabled"/> Disabled</label>
                                </div>
                                <div class="checkbox-inline">
                                    <label><input type="checkbox" name="check_ex1" disabled="disabled" checked="checked"/> Disabled checked</label>
                                </div>                                
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Radio:</div>
                            <div class="col-md-9">
                                <div class="radiobox-inline">
                                    <label><input type="radio" name="radio_ex1"/> Default</label>
                                </div>
                                <div class="radiobox-inline">
                                    <label><input type="radio" name="radio_ex1" checked="checked"/> Checked</label>
                                </div>
                                <div class="radiobox-inline">
                                    <label><input type="radio" name="radio_ex2" disabled="disabled"/> Disabled</label>
                                </div>
                                <div class="radiobox-inline">
                                    <label><input type="radio" name="radio_ex2" disabled="disabled" checked="checked"/> Disabled checked</label>
                                </div>                                
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">File:</div>
                            <div class="col-md-9">
                                <div class="input-group file">                                    
                                    <input type="text" class="form-control"/>
                                    <input type="file" name="file"/>
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">Browse</button>
                                    </span>
                                </div>                                
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Styled File Input:</div>
                            <div class="col-md-9">
                                <input type="file" class="fileinput" name="filename2" id="filename_1"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <input type="file" class="fileinput btn-success" name="filename3" id="filename_2" title="Custom text and background"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <input type="file" class="fileinput btn-danger" name="filename4" id="filename_3" data-filename-placement="inside" title="File name goes inside"/>
                            </div>
                        </div>                        
                    </div>
                </div>                
                
                <div class="block">
                    <div class="header">
                        <h2>Switch</h2>
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-3">Checkbox:</div>
                            <div class="col-md-9">

                                <label class="switch">
                                    <input type="checkbox" class="skip" checked value="0"/>
                                    <span></span>
                                </label>
                                <label class="switch">
                                    <input type="checkbox" class="skip" value="1"/>
                                    <span></span>
                                </label>                                        
                                <label class="switch">
                                    <input type="checkbox" class="skip" value="2"/>
                                    <span></span>
                                </label>
                                <label class="switch">
                                    <input type="checkbox" class="skip" disabled value="2"/>
                                    <span></span>
                                </label>                                     
                                
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Radio:</div>
                            <div class="col-md-9">
                                
                                <label class="switch">
                                    <input type="radio" class="skip" name="switch-radio1" checked value="0"/>
                                    <span></span>
                                </label>
                                <label class="switch">
                                    <input type="radio" class="skip" name="switch-radio1" value="1"/>
                                    <span></span>
                                </label>                                        
                                <label class="switch">
                                    <input type="radio" class="skip" name="switch-radio1" value="2"/>
                                    <span></span>
                                </label>                                        
                                <label class="switch">
                                    <input type="radio" class="skip" name="switch-radio1" disabled value="3"/>
                                    <span></span>
                                </label>                               
                                
                            </div>
                        </div>
                    </div>
                </div>                
                
                <div class="block">
                    <div class="header">
                        <h2>Spinner</h2>
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-3">Default:</div>
                            <div class="col-md-9">
                                <input id="spinner" class="form-control" name="spinner" value="0"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Decimal:</div>
                            <div class="col-md-9">
                                <input id="spinner2" class="form-control" name="spinner" value="0"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Currency:</div>
                            <div class="col-md-9">
                                <input id="spinner3" class="form-control" name="spinner" value="0"/>
                            </div>
                        </div>                        
                    </div>
                </div>
                
                <div class="block">
                    <div class="header">
                        <h2>Select2 plugin</h2>
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-3">Default:</div>
                            <div class="col-md-9">
                                
                                <select class="select2" style="width: 100%;" tabindex="-1">
                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </optgroup>
                                    <optgroup label="Pacific Time Zone">
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </optgroup>
                                    <optgroup label="Mountain Time Zone">
                                        <option value="AZ">Arizona</option>
                                        <option value="CO">Colorado</option>
                                        <option value="ID">Idaho</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="UT">Utah</option>
                                        <option value="WY">Wyoming</option>
                                    </optgroup>
                                    <optgroup label="Central Time Zone">
                                        <option value="AL">Alabama</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IA">Iowa</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MO">Missouri</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TX">Texas</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="WI">Wisconsin</option>
                                    </optgroup>
                                    <optgroup label="Eastern Time Zone">
                                        <option value="CT">Connecticut</option>
                                        <option value="DE">Delaware</option>
                                        <option value="FL">Florida</option>
                                        <option value="GA">Georgia</option>
                                        <option value="IN">Indiana</option>
                                        <option value="ME">Maine</option>
                                        <option value="MD">Maryland</option>
                                        <option value="MA">Massachusetts</option>
                                        <option value="MI">Michigan</option>
                                        <option value="NH">New Hampshire</option>
                                        <option value="NJ">New Jersey</option>
                                        <option value="NY">New York</option>
                                        <option value="NC">North Carolina</option>
                                        <option value="OH">Ohio</option>
                                        <option value="PA">Pennsylvania</option>
                                        <option value="RI">Rhode Island</option>
                                        <option value="SC">South Carolina</option>
                                        <option value="VT">Vermont</option>
                                        <option value="VA">Virginia</option>
                                        <option value="WV">West Virginia</option>
                                    </optgroup>
                                </select>                                
                                
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Multiple:</div>
                            <div class="col-md-9">
                                
                                <select class="select2" multiple="multiple" style="width: 100%;" tabindex="-1">
                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK" selected="selected">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </optgroup>
                                    <optgroup label="Pacific Time Zone">
                                        <option value="CA">California</option>
                                        <option value="NV" selected="selected">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA" selected="selected">Washington</option>
                                    </optgroup>
                                    <optgroup label="Mountain Time Zone">
                                        <option value="AZ">Arizona</option>
                                        <option value="CO">Colorado</option>
                                        <option value="ID">Idaho</option>
                                        <option value="MT" selected="selected">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="UT">Utah</option>
                                        <option value="WY">Wyoming</option>
                                    </optgroup>
                                    <optgroup label="Central Time Zone">
                                        <option value="AL">Alabama</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IA">Iowa</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MO">Missouri</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TX">Texas</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="WI">Wisconsin</option>
                                    </optgroup>
                                    <optgroup label="Eastern Time Zone">
                                        <option value="CT">Connecticut</option>
                                        <option value="DE">Delaware</option>
                                        <option value="FL">Florida</option>
                                        <option value="GA">Georgia</option>
                                        <option value="IN">Indiana</option>
                                        <option value="ME">Maine</option>
                                        <option value="MD">Maryland</option>
                                        <option value="MA">Massachusetts</option>
                                        <option value="MI">Michigan</option>
                                        <option value="NH">New Hampshire</option>
                                        <option value="NJ">New Jersey</option>
                                        <option value="NY">New York</option>
                                        <option value="NC">North Carolina</option>
                                        <option value="OH">Ohio</option>
                                        <option value="PA">Pennsylvania</option>
                                        <option value="RI">Rhode Island</option>
                                        <option value="SC">South Carolina</option>
                                        <option value="VT">Vermont</option>
                                        <option value="VA">Virginia</option>
                                        <option value="WV">West Virginia</option>
                                    </optgroup>
                                </select>                                
                                
                            </div>
                        </div>                        
                    </div>
                </div>
                
                <div class="block">
                    <div class="header">
                        <h2>Tags Input</h2>
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-3">Default:</div>
                            <div class="col-md-9">                                                    
                                <input type="text" class="tags" value="jQuery,HTML,CSS,PHP,Java"/>
                            </div>
                        </div>                                             
                    </div>
                </div>
                
                <div class="block">
                    <div class="header">
                        <h2>Date picker </h2>
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-3">Date:</div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
                                    <input type="text" class="datepicker form-control" value="09/15/2013"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Multiple:</div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="icon-calendar"></span></div>
                                    <input type="text" class="mdatepicker form-control" value="09/15/2013"/>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="block">
                    <div class="header">
                        <h2>Time picker</h2>
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-3">Time:</div>
                            <div class="col-md-9">                                                    
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="icon-time"></span></div>
                                    <input type="text" class="timepicker form-control" value="12:17"/>
                                </div>                                                                
                            </div>
                        </div>                        
                        <div class="form-row">
                            <div class="col-md-3">Date and time:</div>
                            <div class="col-md-9">                                                    
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="icon-globe"></span></div>
                                    <input type="text" class="datetimepicker form-control" value="09/15/2013 12:17"/>
                                </div>                                                                                                
                            </div>
                        </div>                        
                    </div>
                </div>                
                <div class="block">
                    <div class="header">
                        <h2>Slider</h2>
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-3">Default:</div>
                            <div class="col-md-9">                                                    
                                <div class="slider_example"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Range:</div>
                            <div class="col-md-9">                                                    
                                <div class="slider_example2"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Vertical:</div>
                            <div class="col-md-9">                                            
                                <div class="slider_example3" style="height: 150px;"></div>
                                <div class="slider_example4" style="height: 150px;"></div>
                            </div>
                        </div>                        
                    </div>
                </div>                
                                
            </div>
          
          
        