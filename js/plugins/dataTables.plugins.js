$.fn.dataTable.Api.register('row().show()', function() {
    var page_info = this.table().page.info();
    // Get row index
    var new_row_index = this.index();
    // Row position
    var row_position = this.table().rows()[0].indexOf( new_row_index );
    // Already on right page ?
    if( row_position >= page_info.start && row_position < page_info.end ) {
        // Return row object
        return this;
    }
    // Find page number
    var page_to_display = Math.floor( row_position / this.table().page.len() );
    // Go to that page
    this.table().page( page_to_display );
    // Return row object
    return this;
});