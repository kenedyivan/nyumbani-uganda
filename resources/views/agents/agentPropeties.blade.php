
<?php
$future = strtotime($property->expiry_date); //Future date.
$timefromdb = strtotime($property->last_activated_date);
$timeleft = $future-$timefromdb;
$daysleft = round((($timeleft/24)/60)/60);
?>
<div class="item-wrap">
    <div class="media my-property">
        <div class="media-left">
            <div class="figure-block">
                <figure class="item-thumb">
                    @if($property->active==1)
                    <span class="label-featured label label-success">Featured</span>
                    @endif
                    <a href="/property-details/{{$property->id}}">
                        <img src="/public/images/properties/agent_properties_150x110/{{$property->image}}" alt="thumb">
                    </a>
                </figure>
            </div>
        </div>
        <div class="media-body media-middle">
            <div class="my-description">
                <h4 class="my-heading"><a href="/property-details/{{$property->id}}">
                        <span class="label label-warning">
                            @if($t=='published')
                                PUBLISHED
                                @elseif($t=='suspended')
                                SUSPENDED
                                @elseif($t=='expired')
                                EXPIRED
                            @endif
                        </span> {{$property->title}}</a></h4>
                <p class="address">{{$property->address}}, {{$property->district}} {{$property->country}}</p>
                @if($property->for_sale == 1)
                    <?php $status = 'Sale';?>
                @else
                    <?php $status = 'Rent';?>
                @endif
                <p class="status"><strong>Status:</strong> For {{$status}}, <strong> Price:</strong>
                  <span style="text-transform: uppercase;">{{$property->currency}}</span> {{$property->price}}</p>
            </div>
            <div class="my-actions">
                <div class="btn-group">
                    <a href="{{route('agent.edit.listing',['id'=>$property->id])}}" class="action-btn" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                    <a href="{{route('agent.delete.listing',['id'=>$property->id])}}" class="action-btn" data-toggle="tooltip" data-placement="top" title="Remove"><i class="fa fa-close"></i></a>
                </div><!--
                                                            <div class="btn-group">
                                                                <button class="pay-btn action-btn">Pay Now <i class="fa fa-angle-down"></i></button>
                                                                <div class="dropdown-menu">
                                                                    <div class="pay-options">
                                                                        <table>
                                                                            <tr>
                                                                                <td>
                                                                                    Submission Fee
                                                                                </td>
                                                                                <td>$3.00</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="checkbox">
                                                                                        <label>
                                                                                            <input type="checkbox" value="option1">
                                                                                            Featured Fee
                                                                                        </label>
                                                                                    </div>
                                                                                </td>
                                                                                <td>$5.00</td>
                                                                            </tr>
                                                                            <tfoot>
                                                                            <tr>
                                                                                <td>Total</td>
                                                                                <td>$5.00</td>
                                                                            </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                    <ul>
                                                                        <li><a href="#"><i class="fa fa-credit-card"></i> Pay with Credit Card</a></li>
                                                                        <li><a href="#"><i class="fa fa-paypal"></i> Pay with PayPal</a></li>
                                                                        <li><a href="#"><i class="fa fa-retweet"></i> Pay with Wire Transfert</a></li>

                                                                    </ul>
                                                                </div>
                                                            </div>-->
                <p class="expire-text"><strong>Expiration:</strong> {{$daysleft}} days remaining</p>
            </div>
        </div>
    </div>
</div>
