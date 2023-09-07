<?php

use App\Enums\InputType;
use App\Enums\OrderStatus;
use App\Enums\Status;
use App\Enums\UserRole;
use App\Http\Controllers\Slim;
use App\Models\Order;
use App\Models\Setting;
use App\Models\StaticContent;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as ShoppingCart;
// use Gabievi\Promocodes\Facades\Promocodes;
// use Gabievi\Promocodes\Models\Promocode;


/**
 * Get rendered static content
 */
if (!function_exists('getContent')) {
    function getContent($contentSlug, $contentLocale = null, $json = false)
    {
        $contentLocale = $contentLocale ?? app()->getLocale();
        $content = StaticContent::where('slug', $contentSlug)->firstOrFail();
        $result = [
            'name' => $content->name,
            'slug' => $content->slug,
            'structure' => $content->structure->name,
            'locale' => $content->locale,
        ];
        $content->items->each(function ($item, $key) use (&$result) {
            $ss = &$result['content'][$key];
            $item->parts->each(function ($itemPart, $partKey) use (&$ss) {
                $ss[$itemPart->name] = $itemPart->value;
            });
        });
        if (!$content->structure->multiple) $result['content'] = reset($result['content']);

        $result = $json ? json_encode($result) : (object) $result;
        return $result;
    }
}


if (!function_exists('adminNavigation')) {
    function adminNavigation()
    {
        // menu items : dashboard, users, blog, translations, settings
        $menu = [
            [
                'title' => 'General'
            ],
            [
                'title' => __("menu.dashboard.index"),
                'url' => route('dashboard'),
                'icon' => 'bi-house-door',
            ],
            [
                'title' => 'Store'
            ],
            [
                'title' => __('menu.product.index'),
                'url' => '#',
                'icon' => 'bi bi-file-earmark-richtext',
                'children' => [
                    [
                        'title' => __("menu.product.title"),
                        'url' => route('product.index'),
                        'icon' => 'bi bi-file-earmark-richtext',
                    ],
                    // [
                    //     'title' => __("menu.variations.title"),
                    //     'url' => route('variation.index'),
                    //     'icon' => 'bi bi-subtract',
                    // ],
                    [
                        'title' => __("menu.attribute.title"),
                        'url' => route('attribute.index'),
                        'icon' => 'bi bi-blockquote-right',
                    ],
                    [
                        'title' => __("menu.product.categories.title"),
                        'url' => route('product.categories'),
                        'icon' => 'bi bi-bar-chart-steps',
                    ],
                    // [
                    //     'title' => __("menu.tag.title"),
                    //     'url' => route('tag.index'),
                    //     'icon' => 'bi bi-bar-chart-steps',
                    // ],
                ],
            ],
            [
                'title' => __("menu.brand.title"),
                'url' => route('brand.index'),
                'icon' => 'bi bi-bookmarks',
            ],
            [
                'title' => __("menu.services.title"),
                'url' => route('service.index'),
                'icon' => 'bi bi-filter-square',
            ],
            // [
            //     'title' => __("menu.shipping.title"),
            //     'icon' => 'bi bi-truck',
            //     'url' => "#",
            //     'children' => [
            //         [
            //             'title' => __("menu.shipping_methods.title"),
            //             'url' => route('shipping_method.index'),
            //         ],
            //         [
            //             'title' => __("menu.shipping_zones.title"),
            //             'url' => route('shipping_zone.index'),
            //         ]
            //     ]
            // ],
            [
                'title' => 'Sales'
            ],
            [
                'title' => __("menu.order.title"),
                'url' => route('order.index'),
                'icon' => 'bi bi-cart-check-fill',
            ],
            [
                'title' => __("menu.customer.title"),
                'url' => route('customer.index'),
                'icon' => 'bi bi-emoji-smile',
            ],
            // [
            //     'title' => __("menu.promocodes.title"),
            //     'url' => route('promocode.index'),
            //     'icon' => 'bi bi-tag',
            // ],
            [
                'title' => 'Content'
            ],
            // [
            //     'title' => __("menu.blog.index"),
            //     'url' => "#",
            //     'icon' => 'bi bi-journal-richtext',
            //     'children' => [
            //         [
            //             'title' => __("menu.blog.posts.title"),
            //             'url' => route('post.index'),
            //             'icon' => 'bi bi-file-earmark-richtext',
            //         ],
            //         [
            //             'title' => __("menu.blog.categories.title"),
            //             'url' => route('blog.categories'),
            //             'icon' => 'bi bi-bar-chart-steps',
            //         ]
            //     ]
            // ],
            [
                'title' => __("menu.static_content.title"),
                'url' => "#",
                'icon' => 'bi bi-newspaper',
                'children' => [
                    [
                        'title' => __("menu.static_content.title"),
                        "url" => route('static_content.index')
                    ],
                    [
                        'title' => __("menu.static_content_structure.title"),
                        "url" => route('static_content_structure.index')
                    ]
                ]
            ],
            [
                'title' => __("menu.filemanager.title"),
                'url' => route('filemanager.index'),
                'icon' => 'bi bi-folder2',
            ],
            [
                'title' => 'Users'
            ],
            [
                'title' => __("menu.users.index"),
                'url' => '#',
                'icon' => 'bi-people',
                'children' => [
                    [
                        'title' => __("menu.users.users"),
                        'url' => route('user.index'),
                        'icon' => 'bi bi-user',
                    ],
                    [
                        'title' => __("menu.users.roles"),
                        'url' => route('role.index'),
                        'icon' => 'bi bi-key',
                    ],
                ]
            ],
        ];

        if (auth()->user()->hasRole(UserRole::SU)) {
            $menu = array_merge($menu, [
                [
                    'title' => 'System'
                ],
                [
                    'title' => __("menu.system.title"),
                    'url' => "#",
                    'icon' => 'bi bi-cpu',
                    'children' => [
                        [
                            'title' => __("menu.translations.index"),
                            'url' => route('translations.index'),
                            'icon' => 'bi-body-text',
                        ],
                        [
                            'title' => __("menu.menu-builder.index"),
                            'url' => route('menu.index'),
                            'icon' => 'bi-body-text',
                        ],
                        [
                            'title' => __("menu.settings.index"),
                            'url' => route('settings.index'),
                            'icon' => 'bi-sliders',
                        ],
                        [
                            'title' => __("menu.log.title"),
                            'url' => url('log-viewer'),
                            'icon' => 'bi-list-columns',
                        ],
                        [
                            'title' => __("menu.backup.title"),
                            'url' => route('system.backup.list'),
                            'icon' => 'bi-server',
                        ],
                    ]
                ]
            ]);
        }

        return view('layouts.parts.nav-item', compact('menu'))->render();
    }
}


/**
 * Calculate ratio from size
 */
if (!function_exists('getImageRatioFromSize')) {
    function getImageRatioFromSize($size)
    {
        $size = explode(',', $size);
        $a = $size[0];
        $b = $size[1];
        $gcd = function ($a, $b) use (&$gcd) {
            return ($a % $b) ? $gcd($b, $a % $b) : $b;
        };
        $g = $gcd($a, $b);
        return $a / $g . ':' . $b / $g;
    }
}

/**
 * Calculate ratio from size
 */
if (!function_exists('getStatusHtml')) {
    function getStatusHtml($status)
    {
        $html = [
            Status::ACTIVE => '<span class="badge bg-soft-success text-success ms-2">%s</span>',
            Status::INACTIVE => '<span class="badge bg-soft-danger text-success ms-2">%s</span>',
            Status::BANNED => '<span class="badge bg-danger text-success ms-2">%s</span>',
            Status::DRAFT => '<span class="badge bg-soft-dark text-success ms-2">%s</span>',
            OrderStatus::NEW_ORDER => '<span class="badge bg-soft-success text-success ms-sm-3"><span class="legend-indicator bg-info text-white"></span>%s</span>',
        ];

        return isset($html[$status]) ? sprintf($html[$status], $status) : "";
    }
}



/**
 * in_array multi dimension
 */
if (!function_exists('in_array_r')) {
    function in_array_r($needle, $haystack, $strict = false)
    {
        foreach ($haystack as $item) {
            if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
                return true;
            }
        }

        return false;
    }
}



/**
 *
 * Upload image from slim cropper
 */
if (!function_exists('uploadSlimImage')) {
    function uploadSlimImage(Request $request, ...$file_names)
    {
        $fileUrl = [];
        foreach ($file_names as $file_name) {
            /**
             * Save Images with slim cropper
             */
            if ($request->$file_name) {
                if (is_iterable($request->$file_name)) {
                    $images = Slim::getImages($file_name);
                    foreach ($request->$file_name as $index => $file) {
                        $image = $images[$index];
                        // Grab the ouput data (data modified after Slim has done its thing)
                        // dd($image['output']['data'], $image['output']['name']);
                        if (isset($image['output']['data'], $image['output']['name'])) {
                            // Original file name
                            $name = $image['output']['name'];

                            // Base64 of the image
                            $data = $image['output']['data'];

                            // Server path
                            $path = 'media/images';

                            // Save the file to the server
                            $file = Slim::saveFile($data, $name, $path);

                            // Get the absolute web path to the image
                            $path = "storage/$path/" . $file['name'];

                            $fileUrl[$file_name][] = $path;
                        }
                    }
                } else {
                    // Pass Slim's getImages the name of your file input, and since we only care about one image, use Laravel's head() helper to get the first element
                    $image = head(Slim::getImages($file_name));
                    // Grab the ouput data (data modified after Slim has done its thing)
                    if (isset($image['output']['data'])) {
                        // Original file name
                        $name = $image['output']['name'];

                        // Base64 of the image
                        $data = $image['output']['data'];

                        // Server path
                        $path = 'media/images';

                        // Save the file to the server
                        $file = Slim::saveFile($data, $name, $path);

                        // Get the absolute web path to the image
                        $path = "storage/$path/" . $file['name'];

                        $fileUrl[$file_name] = $path;
                    }
                }
            }
        }

        return $fileUrl;
    }
}


if (!function_exists('uploadVariationSlimImage')) {
    function uploadVariationSlimImage(Request $request, $file_name)
    {
        // $image = head(Slim::getImages($file_name));
        $image = json_decode($request->{$file_name});

        // Grab the ouput data (data modified after Slim has done its thing)
        if (isset($image->output->image)) {
            // Original file name
            $name = $image->output->name;
            // Base64 of the image
            // $data = str_replace('data:', '', $image->output->image);
            $parsed = Slim::parseInput($request->{$file_name});
            $data = $parsed['output'];
            // Server path
            $path = 'media/images/productvariations';
            // Save the file to the server
            $file = Slim::saveFile($data, $name, $path);
            // Get the absolute web path to the image
            $path = "storage/$path/" . $file['name'];
            $fileUrl[$file_name] = $path;
        }

        return $fileUrl;
    }
}


if (!function_exists('uploadSlimImageNoRequest')) {
    function uploadSlimImageNoRequest($content, $file_name)
    {
        // $image = head(Slim::getImages($file_name));
        $image = json_decode($content);

        // Grab the ouput data (data modified after Slim has done its thing)
        if (isset($image->output->image)) {
            // Original file name
            $name = $image->output->name;
            // Base64 of the image
            // $data = str_replace('data:image/png;base64,', '', $image->output->image);
            $parsed = Slim::parseInput($content);
            $data = $parsed['output'];
            // Server path
            $path = 'media/static';
            // Save the file to the server
            $file = Slim::saveFile($data, $name, $path);
            // dd($image, $file, $data,$image->output->image);
            // Get the absolute web path to the image
            $path = "storage/$path/" . $file['name'];
            $fileUrl[$file_name] = $path;
        }

        return $fileUrl;
    }
}




/**
 * Setting
 */
if (!function_exists('setting')) {
    function setting($key, $f = false)
    {
        $setting = Setting::where('key', $key)->first();
        if( $setting == null ) return null;
        if ($f) return $setting;
        if ($setting->type == InputType::IMAGE) return Storage::url($setting->value);
        if ($setting->type == InputType::FILE) return url($setting->value);
        return $setting->value;
    }
}



/**
 * User Cart
 */
if (!function_exists('cart')) {
    function cart()
    {
        $session_id = auth()->user()->id ?? request()->session()->getId();
        $shoppingCart = ShoppingCart::session($session_id);
        return $shoppingCart;
    }
}



/**
 * Format price with currency
 *
 * TODO:: Add currency symbol from distributor
 */
if (!function_exists('formatPrice')) {
    function formatPrice($price, $decimal = 2)
    {
        if (is_numeric($price))
            return sprintf('%s %s', optional(getAvailableCurrencies(config('app.currency')))->symbol, number_format($price, $decimal));
        else
            return $price;
    }
}


/**
 * Format price with currency for specific order
 *
 * TODO:: Add currency symbol from distributor
 */
if (!function_exists('formatOrderPrice')) {
    function formatOrderPrice(Order $order, $decimal = 2)
    {
        return sprintf('%s %s', getAvailableCurrencies($order->currency_code)['icon'], number_format($order->total, $decimal));
    }
}

/**
 *
 * Get application avalable languages
 */
if (!function_exists("getAvailableCurrencies")) {
    function getAvailableCurrencies($code = null)
    {
        // if ($code)
        //     return SiteCurrency::where('status', '=', Status::ACTIVE)->where('code', $code)->first();
        // return SiteCurrency::where('status', '=', Status::ACTIVE)->get();

        if ($code)
            return isset(config('app.site_currencies')[$code]) ? config('app.site_currencies')[$code] : 'undefined';
        return config('app.site_currencies');
    }
}


if (!function_exists('geoFormat')) {
    function geoFormat($location, $format)
    {
        dd(Locale::parseLocale($location));
        $format = app('geocoder')->geocode($location)->get();
        // dd($format);
        return $format;
    }
}

/**
 * COUPON OPERATIONS
 */
// if (!function_exists('checkCoupon')) {
//     function checkCoupon($couponCode)
//     {
//         return Promocodes::check($couponCode);
//     }
// }

// if (!function_exists('disposeCoupon')) {
//     function disposeCoupon()
//     {
//         $currentCouponCode = request()->session()->pull('coupon-code');
//         if ($currentCouponCode != null)
//             Promocodes::apply($currentCouponCode);
//     }
// }


if (!function_exists('applyCoupon')) {
    function applyCoupon($couponCode)
    {
        // prevent multiple coupon use
        $appliedCoupons = cart()->getConditionsByType('coupon');
        foreach ($appliedCoupons as $condition) {
            cart()->removeCartCondition($condition->getName());
        }

        $promocode = Promocode::where('code', $couponCode)->first();
        $discountAmount = trim($promocode->data['discount']);
        $discountType = (trim($promocode->data['type']) == 'percent' ? '%' : '');

        if (isset($promocode->data['products']))
            $couponProducts = explode(',', $promocode->data['products']);
        if (isset($promocode->data['products']) && count($couponProducts) > 0) {
            $products = $couponProducts;
            $cartItems = [];
            foreach (cart()->getContent() as $cartItem) {
                $cartItems[optional($cartItem->associatedModel)->id ?? $cartItem->attributes['associated_id'] ?? 0] = $cartItem->price;
            }
            $intersect = array_intersect($products, array_keys($cartItems));
            if (!$intersect) {
                return $couponmessage = __('Coupon code is not valid for selected items!');
            } else {
                $intesectedProductPrice = collect($cartItems[$intersect[0]])->first();
                if ($discountType == '%')
                    $discountAmount = $intesectedProductPrice * $discountAmount / 100;
                else
                    $discountAmount = $discountAmount;

                $condition = new \Darryldecode\Cart\CartCondition(array(
                    'name' => __('Coupon (:code)', ['code' => $couponCode]),
                    'type' => 'coupon',
                    'target' => 'total',
                    'value' => ($discountAmount * -1),
                    'order' => 10000001
                ));

                cart()->condition($condition);
                request()->session()->put('coupon-code', $couponCode);
            }
        } else {

            if ($discountType == '%')
                $discountAmount = cart()->getSubTotal() * $discountAmount / 100;
            else
                $discountAmount = $discountAmount;

            $condition = new \Darryldecode\Cart\CartCondition(array(
                'name' => __('COUPON (:code)', ['code' => $couponCode]),
                'type' => 'coupon',
                'target' => 'total',
                'value' => ($discountAmount * -1),
                'order' => 10000001
            ));

            cart()->condition($condition);
            request()->session()->put('coupon-code', $couponCode);
        }

        return $couponmessage = 'Coupon code applied successfully';
    }
}


if (!function_exists('recalculateCoupons')) {
    function recalculateCoupons()
    {
        $currentCouponCode = request()->session()->pull('coupon-code');
        if ($currentCouponCode != null)
            applyCoupon($currentCouponCode);
    }
}


if (!function_exists('getCountry')) {
    function getCountry($location)
    {
        $code = strtoupper($location);

        $countryList = array(
            'AF' => 'Afghanistan',
            'AX' => 'Aland Islands',
            'AL' => 'Albania',
            'DZ' => 'Algeria',
            'AS' => 'American Samoa',
            'AD' => 'Andorra',
            'AO' => 'Angola',
            'AI' => 'Anguilla',
            'AQ' => 'Antarctica',
            'AG' => 'Antigua and Barbuda',
            'AR' => 'Argentina',
            'AM' => 'Armenia',
            'AW' => 'Aruba',
            'AU' => 'Australia',
            'AT' => 'Austria',
            'AZ' => 'Azerbaijan',
            'BS' => 'Bahamas the',
            'BH' => 'Bahrain',
            'BD' => 'Bangladesh',
            'BB' => 'Barbados',
            'BY' => 'Belarus',
            'BE' => 'Belgium',
            'BZ' => 'Belize',
            'BJ' => 'Benin',
            'BM' => 'Bermuda',
            'BT' => 'Bhutan',
            'BO' => 'Bolivia',
            'BA' => 'Bosnia and Herzegovina',
            'BW' => 'Botswana',
            'BV' => 'Bouvet Island (Bouvetoya)',
            'BR' => 'Brazil',
            'IO' => 'British Indian Ocean Territory (Chagos Archipelago)',
            'VG' => 'British Virgin Islands',
            'BN' => 'Brunei Darussalam',
            'BG' => 'Bulgaria',
            'BF' => 'Burkina Faso',
            'BI' => 'Burundi',
            'KH' => 'Cambodia',
            'CM' => 'Cameroon',
            'CA' => 'Canada',
            'CV' => 'Cape Verde',
            'KY' => 'Cayman Islands',
            'CF' => 'Central African Republic',
            'TD' => 'Chad',
            'CL' => 'Chile',
            'CN' => 'China',
            'CX' => 'Christmas Island',
            'CC' => 'Cocos (Keeling) Islands',
            'CO' => 'Colombia',
            'KM' => 'Comoros the',
            'CD' => 'Congo',
            'CG' => 'Congo the',
            'CK' => 'Cook Islands',
            'CR' => 'Costa Rica',
            'CI' => 'Cote d\'Ivoire',
            'HR' => 'Croatia',
            'CU' => 'Cuba',
            'CY' => 'Cyprus',
            'CZ' => 'Czech Republic',
            'DK' => 'Denmark',
            'DJ' => 'Djibouti',
            'DM' => 'Dominica',
            'DO' => 'Dominican Republic',
            'EC' => 'Ecuador',
            'EG' => 'Egypt',
            'SV' => 'El Salvador',
            'GQ' => 'Equatorial Guinea',
            'ER' => 'Eritrea',
            'EE' => 'Estonia',
            'ET' => 'Ethiopia',
            'FO' => 'Faroe Islands',
            'FK' => 'Falkland Islands (Malvinas)',
            'FJ' => 'Fiji the Fiji Islands',
            'FI' => 'Finland',
            'FR' => 'France, French Republic',
            'GF' => 'French Guiana',
            'PF' => 'French Polynesia',
            'TF' => 'French Southern Territories',
            'GA' => 'Gabon',
            'GM' => 'Gambia the',
            'GE' => 'Georgia',
            'DE' => 'Germany',
            'GH' => 'Ghana',
            'GI' => 'Gibraltar',
            'GR' => 'Greece',
            'GL' => 'Greenland',
            'GD' => 'Grenada',
            'GP' => 'Guadeloupe',
            'GU' => 'Guam',
            'GT' => 'Guatemala',
            'GG' => 'Guernsey',
            'GN' => 'Guinea',
            'GW' => 'Guinea-Bissau',
            'GY' => 'Guyana',
            'HT' => 'Haiti',
            'HM' => 'Heard Island and McDonald Islands',
            'VA' => 'Holy See (Vatican City State)',
            'HN' => 'Honduras',
            'HK' => 'Hong Kong',
            'HU' => 'Hungary',
            'IS' => 'Iceland',
            'IN' => 'India',
            'ID' => 'Indonesia',
            'IR' => 'Iran',
            'IQ' => 'Iraq',
            'IE' => 'Ireland',
            'IM' => 'Isle of Man',
            'IL' => 'Israel',
            'IT' => 'Italy',
            'JM' => 'Jamaica',
            'JP' => 'Japan',
            'JE' => 'Jersey',
            'JO' => 'Jordan',
            'KZ' => 'Kazakhstan',
            'KE' => 'Kenya',
            'KI' => 'Kiribati',
            'KP' => 'Korea',
            'KR' => 'Korea',
            'KW' => 'Kuwait',
            'KG' => 'Kyrgyz Republic',
            'LA' => 'Lao',
            'LV' => 'Latvia',
            'LB' => 'Lebanon',
            'LS' => 'Lesotho',
            'LR' => 'Liberia',
            'LY' => 'Libyan Arab Jamahiriya',
            'LI' => 'Liechtenstein',
            'LT' => 'Lithuania',
            'LU' => 'Luxembourg',
            'MO' => 'Macao',
            'MK' => 'Macedonia',
            'MG' => 'Madagascar',
            'MW' => 'Malawi',
            'MY' => 'Malaysia',
            'MV' => 'Maldives',
            'ML' => 'Mali',
            'MT' => 'Malta',
            'MH' => 'Marshall Islands',
            'MQ' => 'Martinique',
            'MR' => 'Mauritania',
            'MU' => 'Mauritius',
            'YT' => 'Mayotte',
            'MX' => 'Mexico',
            'FM' => 'Micronesia',
            'MD' => 'Moldova',
            'MC' => 'Monaco',
            'MN' => 'Mongolia',
            'ME' => 'Montenegro',
            'MS' => 'Montserrat',
            'MA' => 'Morocco',
            'MZ' => 'Mozambique',
            'MM' => 'Myanmar',
            'NA' => 'Namibia',
            'NR' => 'Nauru',
            'NP' => 'Nepal',
            'AN' => 'Netherlands Antilles',
            'NL' => 'Netherlands the',
            'NC' => 'New Caledonia',
            'NZ' => 'New Zealand',
            'NI' => 'Nicaragua',
            'NE' => 'Niger',
            'NG' => 'Nigeria',
            'NU' => 'Niue',
            'NF' => 'Norfolk Island',
            'MP' => 'Northern Mariana Islands',
            'NO' => 'Norway',
            'OM' => 'Oman',
            'PK' => 'Pakistan',
            'PW' => 'Palau',
            'PS' => 'Palestinian Territory',
            'PA' => 'Panama',
            'PG' => 'Papua New Guinea',
            'PY' => 'Paraguay',
            'PE' => 'Peru',
            'PH' => 'Philippines',
            'PN' => 'Pitcairn Islands',
            'PL' => 'Poland',
            'PT' => 'Portugal, Portuguese Republic',
            'PR' => 'Puerto Rico',
            'QA' => 'Qatar',
            'RE' => 'Reunion',
            'RO' => 'Romania',
            'RU' => 'Russian Federation',
            'RW' => 'Rwanda',
            'BL' => 'Saint Barthelemy',
            'SH' => 'Saint Helena',
            'KN' => 'Saint Kitts and Nevis',
            'LC' => 'Saint Lucia',
            'MF' => 'Saint Martin',
            'PM' => 'Saint Pierre and Miquelon',
            'VC' => 'Saint Vincent and the Grenadines',
            'WS' => 'Samoa',
            'SM' => 'San Marino',
            'ST' => 'Sao Tome and Principe',
            'SA' => 'Saudi Arabia',
            'SN' => 'Senegal',
            'RS' => 'Serbia',
            'SC' => 'Seychelles',
            'SL' => 'Sierra Leone',
            'SG' => 'Singapore',
            'SK' => 'Slovakia (Slovak Republic)',
            'SI' => 'Slovenia',
            'SB' => 'Solomon Islands',
            'SO' => 'Somalia, Somali Republic',
            'ZA' => 'South Africa',
            'GS' => 'South Georgia and the South Sandwich Islands',
            'ES' => 'Spain',
            'LK' => 'Sri Lanka',
            'SD' => 'Sudan',
            'SR' => 'Suriname',
            'SJ' => 'Svalbard & Jan Mayen Islands',
            'SZ' => 'Swaziland',
            'SE' => 'Sweden',
            'CH' => 'Switzerland, Swiss Confederation',
            'SY' => 'Syrian Arab Republic',
            'TW' => 'Taiwan',
            'TJ' => 'Tajikistan',
            'TZ' => 'Tanzania',
            'TH' => 'Thailand',
            'TL' => 'Timor-Leste',
            'TG' => 'Togo',
            'TK' => 'Tokelau',
            'TO' => 'Tonga',
            'TT' => 'Trinidad and Tobago',
            'TN' => 'Tunisia',
            'TR' => 'Turkey',
            'TM' => 'Turkmenistan',
            'TC' => 'Turks and Caicos Islands',
            'TV' => 'Tuvalu',
            'UG' => 'Uganda',
            'UA' => 'Ukraine',
            'AE' => 'United Arab Emirates',
            'GB' => 'United Kingdom',
            'US' => 'United States of America',
            'UM' => 'United States Minor Outlying Islands',
            'VI' => 'United States Virgin Islands',
            'UY' => 'Uruguay, Eastern Republic of',
            'UZ' => 'Uzbekistan',
            'VU' => 'Vanuatu',
            'VE' => 'Venezuela',
            'VN' => 'Vietnam',
            'WF' => 'Wallis and Futuna',
            'EH' => 'Western Sahara',
            'YE' => 'Yemen',
            'ZM' => 'Zambia',
            'ZW' => 'Zimbabwe'
        );

        if (array_key_exists($code, $countryList)) return $countryList[$code];
        if (in_array($location, $countryList)) return array_flip($countryList)[$location];
        else return null;
    }
}
