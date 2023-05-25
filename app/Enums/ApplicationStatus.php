<?php

namespace App\Enums;

enum ApplicationStatus:string {
    case Wishlist = 'wishlist';
    case WantToApply = 'wantToApply';
    case Applied = 'applied';
    case Interview = 'interview';
    case Offer = 'offer';
    case Rejected = 'rejected';

}
