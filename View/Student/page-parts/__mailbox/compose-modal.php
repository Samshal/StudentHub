<div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Compose New Message</h4>
        </div>
        <form action="#" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-users"></i> User Type:</span>
                        <select name="email_to"  class="form-control">
                            <option value="1">Student</option>
                            <option value="2">Faculty</option>
                            <option value="3">Administrator</option>
                            <option>______________________________________________</optiom>
                            <option selected="selected">Which group of users do you want to send this message to ?</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i> Username:</span>
                        <input name="email_to" type="email" class="form-control" placeholder="Use commas to delimit the usernames if they are more than one">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-edit"></i> Message Title:</span>
                        <input name="email_to" type="email" class="form-control" placeholder="What is the headline of this message?">
                    </div>
                </div>
                <div class="form-group">
                    <textarea name="message" id="email_message" class="form-control" placeholder="Type the Message here" style="height: 120px;"></textarea>
                </div>
                <div class="form-group">                                
                    <div class="btn btn-success btn-file">
                        <i class="fa fa-paperclip"></i> Attachment
                        <input type="file" name="attachment"/>
                    </div>
                    <p class="help-block">Max. 32MB</p>
                </div>

            </div>
            <div class="modal-footer clearfix">

                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-save"></i> Save as Draft</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Discard</button>

                <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-envelope"></i> Send Message</button>
            </div>
        </form>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->