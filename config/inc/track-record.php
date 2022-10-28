<?php function TrackRecord() {
$hdr_track = get_field( 'track_record', 'options' ); ?>
<div class="track-record | uk-overlay uk-position-bottom-right">
    <h2>Investment Property Track Record - Since 2008</h2>
    <div class="record-wrapper | uk-light">
        <div class="record-item box-blue">
            <div>
                <img src="<?php echo _uri.'/resources/images/track-record/img-clients-served.png'; ?>" alt="Clients Served">
                Client Served
                <span class="record-value"><?php echo $hdr_track['tr_clients_served']; ?></span>
            </div>
        </div>
        <div class="record-item box-blue">
            <div>
                <img src="<?php echo _uri.'/resources/images/track-record/img-assets-refinanced.png'; ?>" alt="Assets Refinanced">
                Assets Refinanced
                <span class="record-value"><?php echo $hdr_track['tr_assets_refinanced']; ?></span>
            </div>
        </div>
        <div class="record-item box-blue">
            <div>
                <img src="<?php echo _uri.'/resources/images/track-record/img-assets-sold.png'; ?>" alt="Assets Sold">
                Assets Sold
                <span class="record-value"><?php echo $hdr_track['tr_assets_sold']; ?></span>
            </div>
        </div>
        <div class="record-item box-blue">
            <div>
                <img src="<?php echo _uri.'/resources/images/track-record/img-properties.png'; ?>" alt="Properties">
                Properties
                <span class="record-value"><?php echo $hdr_track['tr_properties']; ?></span>
            </div>
        </div>
        <div class="record-item box-blue">
            <div>
                <img src="<?php echo _uri.'/resources/images/track-record/img-states.png'; ?>" alt="States">
                States
                <span class="record-value"><?php echo $hdr_track['tr_states']; ?></span>
            </div>
        </div>
        <div class="record-item alt box-dark-green">
            <div class="record-info">
                <?php echo '$'.$hdr_track['tr_cash_distribution']; ?>
                <span class="notation">Million</span>
                <small>Total Cash Distribution Delivered</small>
            </div>
        </div>
        <div class="record-item alt box-light-green">
            <div class="record-info">
                <?php echo '$'.$hdr_track['tr_portfolio_value']; ?>
                <span class="notation">Billion</span>
                <small>Managed Portfolio Value</small>
            </div>
        </div>
        <div class="record-item alt box-orange">
            <div class="record-info">
                <?php echo $hdr_track['tr_portfolio_sf']; ?>
                <span class="notation">Million</span>
                <small>Managed Portfolio Square Footage</small>
            </div>
        </div>
    </div>
</div>
<?php }
add_action( 'TrackRecord', 'TrackRecord' );