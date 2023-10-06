<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

/**
 * Class CurrencySeeder
 */
class CurrencySeeder extends Seeder
{
    public function run()
    {
        $input = [
            [
                'currency_name' => 'USD US Dollar',
                'currency_icon' => '$',
                'currency_code' => 'USD',
            ],
            [
                'currency_name' => 'EUR Euro',
                'currency_icon' => '€',
                'currency_code' => 'EUR',
            ],
            [
                'currency_name' => 'HKD Hong Kong Dollar',
                'currency_icon' => '$',
                'currency_code' => 'HKD',
            ],
            [
                'currency_name' => 'INR Indian Rupee',
                'currency_icon' => '₹',
                'currency_code' => 'INR',
            ],
            [
                'currency_name' => 'AUD Australian Dollar',
                'currency_icon' => '$',
                'currency_code' => 'AUD',
            ],
            [
                'currency_name' => 'JMD Jamaican Dollar',
                'currency_icon' => 'J$',
                'currency_code' => 'JMD',
            ],
            [
                'currency_name' => 'CAD Canadian Dollar',
                'currency_icon' => '$',
                'currency_code' => 'CAD',
            ],
            [
                'currency_name' => 'AED United Arab Emirates Dirham',
                'currency_icon' => 'د.إ',
                'currency_code' => 'AED',
            ],
            [
                'currency_name' => 'AFN Afghanistan Afghani',
                'currency_icon' => '؋',
                'currency_code' => 'AFN',
            ],
            [
                'currency_name' => 'ALL Albania Lek',
                'currency_icon' => 'Lek',
                'currency_code' => 'ALL',
            ],
            [
                'currency_name' => 'AMD Armenian Dram',
                'currency_icon' => '֏',
                'currency_code' => 'AMD',
            ],
            [
                'currency_name' => 'ANG Netherlands Antilles Guilder',
                'currency_icon' => 'ƒ',
                'currency_code' => 'ANG',
            ],
            [
                'currency_name' => 'AOA Angola kwanza',
                'currency_icon' => 'Kz',
                'currency_code' => 'AOA',
            ],
            [
                'currency_name' => 'ARS Argentina Peso',
                'currency_icon' => '$',
                'currency_code' => 'ARS',
            ],
            [
                'currency_name' => 'AWG Aruba Guilder',
                'currency_icon' => 'ƒ',
                'currency_code' => 'AWG',
            ],
            [
                'currency_name' => 'AZN Azerbaijan Manat',
                'currency_icon' => '₼',
                'currency_code' => 'AZN',
            ],
            [
                'currency_name' => 'BAM Bosnia and Herzegovina Convertible Marka',
                'currency_icon' => 'KM',
                'currency_code' => 'BAM',
            ],
            [
                'currency_name' => 'BBD Barbados Dollar',
                'currency_icon' => '$',
                'currency_code' => 'BBD',
            ],
            [
                'currency_name' => 'BDT Bangladesh Taka',
                'currency_icon' => '৳',
                'currency_code' => 'BDT',
            ],
            [
                'currency_name' => 'BGN Bulgaria Lev',
                'currency_icon' => 'лв',
                'currency_code' => 'BGN',
            ],
            [
                'currency_name' => 'BMD Bermuda Dollar',
                'currency_icon' => '$',
                'currency_code' => 'BMD',
            ],
            [
                'currency_name' => 'BND Brunei Darussalam Dollar',
                'currency_icon' => '$',
                'currency_code' => 'BND',
            ],
            [
                'currency_name' => 'BOB Bolivia Boliviano',
                'currency_icon' => '$b',
                'currency_code' => 'BOB',
            ],
            [
                'currency_name' => 'BRL Brazil Real',
                'currency_icon' => 'R$',
                'currency_code' => 'BRL',
            ],
            [
                'currency_name' => 'BSD Bahamas Dollar',
                'currency_icon' => '$',
                'currency_code' => 'BSD',
            ],
            [
                'currency_name' => 'BWP Botswana Pula',
                'currency_icon' => 'P',
                'currency_code' => 'BWP',
            ],
            [
                'currency_name' => 'BZD Belize Dollar',
                'currency_icon' => 'BZ$',
                'currency_code' => 'BZD',
            ],
            [
                'currency_name' => 'CDF Congo Congolese franc',
                'currency_icon' => 'FC',
                'currency_code' => 'CDF',
            ],
            [
                'currency_name' => 'CHF Switzerland Franc',
                'currency_icon' => 'CHF',
                'currency_code' => 'CHF',
            ],
            [
                'currency_name' => 'CNY China Yuan Renminbi',
                'currency_icon' => '¥',
                'currency_code' => 'CNY',
            ],
            [
                'currency_name' => 'COP Colombia Peso',
                'currency_icon' => '$',
                'currency_code' => 'COP',
            ],
            [
                'currency_name' => 'CRC Costa Rica Colon',
                'currency_icon' => '₡',
                'currency_code' => 'CRC',
            ],
            [
                'currency_name' => 'CVE Cape Verde Escudo',
                'currency_icon' => '$',
                'currency_code' => 'CVE',
            ],
            [
                'currency_name' => 'CZK Czech Republic Koruna',
                'currency_icon' => 'Kč',
                'currency_code' => 'CZK',
            ],
            [
                'currency_name' => 'DKK Denmark Krone',
                'currency_icon' => 'kr',
                'currency_code' => 'DKK',
            ],
            [
                'currency_name' => 'DOP Dominican Republic Peso',
                'currency_icon' => 'RD$',
                'currency_code' => 'DOP',
            ],
            [
                'currency_name' => 'DZD Algeria Dinar',
                'currency_icon' => 'دج',
                'currency_code' => 'DZD',
            ],
            [
                'currency_name' => 'EGP Egypt Pound',
                'currency_icon' => '£',
                'currency_code' => 'EGP',
            ],
            [
                'currency_name' => 'ETB Ethiopia Birr',
                'currency_icon' => 'ብር',
                'currency_code' => 'ETB',
            ],
            [
                'currency_name' => 'FJD Fiji Dollar',
                'currency_icon' => '$',
                'currency_code' => 'FJD',
            ],
            [
                'currency_name' => 'FKP Falkland Islands Pound',
                'currency_icon' => '£',
                'currency_code' => 'FKP',
            ],
            [
                'currency_name' => 'GBP United Kingdom Pound',
                'currency_icon' => '£',
                'currency_code' => 'GBP',
            ],
            [
                'currency_name' => 'GEL Georgia Lari',
                'currency_icon' => '₾',
                'currency_code' => 'GEL',
            ],
            [
                'currency_name' => 'GIP Gibraltar Pound',
                'currency_icon' => '£',
                'currency_code' => 'GIP',
            ],
            [
                'currency_name' => 'GMD Gambia Dalasi',
                'currency_icon' => 'D',
                'currency_code' => 'GMD',
            ],
            [
                'currency_name' => 'GTQ Guatemala Quetzal',
                'currency_icon' => 'Q',
                'currency_code' => 'GTQ',
            ],
            [
                'currency_name' => 'GYD Guyana Dollar',
                'currency_icon' => '$',
                'currency_code' => 'GYD',
            ],
            [
                'currency_name' => 'HNL Honduras Lempira',
                'currency_icon' => 'L',
                'currency_code' => 'HNL',
            ],
            [
                'currency_name' => 'HRK Croatia Kuna',
                'currency_icon' => 'kn',
                'currency_code' => 'HRK',
            ],
            [
                'currency_name' => 'HTG Haiti Gourde',
                'currency_icon' => 'G',
                'currency_code' => 'HTG',
            ],
            [
                'currency_name' => 'HUF Hungary Forint',
                'currency_icon' => 'Ft',
                'currency_code' => 'HUF',
            ],
            [
                'currency_name' => 'IDR Indonesia Rupiah',
                'currency_icon' => 'Rp',
                'currency_code' => 'IDR',
            ],
            [
                'currency_name' => 'ILS Israel Shekel',
                'currency_icon' => '₪',
                'currency_code' => 'ILS',
            ],
            [
                'currency_name' => 'ISK Iceland Krona',
                'currency_icon' => 'kr',
                'currency_code' => 'ISK',
            ],
            [
                'currency_name' => 'KES Kenya Shilling',
                'currency_icon' => '/=',
                'currency_code' => 'KES',
            ],
            [
                'currency_name' => 'KGS Kyrgyzstan Som',
                'currency_icon' => 'лв',
                'currency_code' => 'KGS',
            ],
            [
                'currency_name' => 'KHR Cambodia Riel',
                'currency_icon' => '៛',
                'currency_code' => 'KHR',
            ],
            [
                'currency_name' => 'KYD Cayman Dollar',
                'currency_icon' => '$',
                'currency_code' => 'KYD',
            ],
            [
                'currency_name' => 'KZT Kazakhstan Tenge',
                'currency_icon' => 'лв',
                'currency_code' => 'KZT',
            ],
            [
                'currency_name' => 'LAK Laos Kip',
                'currency_icon' => '₭',
                'currency_code' => 'LAK',
            ],
            [
                'currency_name' => 'LBP Lebanon Pound',
                'currency_icon' => '£',
                'currency_code' => 'LBP',
            ],
            [
                'currency_name' => 'LKR Sri Lanka Rupee',
                'currency_icon' => '₨',
                'currency_code' => 'LKR',
            ],
            [
                'currency_name' => 'LRD Liberia Dollar',
                'currency_icon' => '$',
                'currency_code' => 'LRD',
            ],
            [
                'currency_name' => 'LSL Lesotho Loti',
                'currency_icon' => 'L',
                'currency_code' => 'LSL',
            ],
            [
                'currency_name' => 'MAD Morocco Dirham',
                'currency_icon' => 'MAD',
                'currency_code' => 'MAD',
            ],
            [
                'currency_name' => 'MDL Moldova Leu',
                'currency_icon' => 'L',
                'currency_code' => 'MDL',
            ],
            [
                'currency_name' => 'MKD Macedonia Denar',
                'currency_icon' => 'ден',
                'currency_code' => 'MKD',
            ],
            [
                'currency_name' => 'MMK Myanmar Kyat',
                'currency_icon' => 'K',
                'currency_code' => 'MMK',
            ],
            [
                'currency_name' => 'MNT Mongolia Tughrik',
                'currency_icon' => '₮',
                'currency_code' => 'MNT',
            ],
            [
                'currency_name' => 'MOP Macau P ataca',
                'currency_icon' => 'MOP$',
                'currency_code' => 'MOP',
            ],
            [
                'currency_name' => 'MRO Mauritania Ouguiya',
                'currency_icon' => 'MRU',
                'currency_code' => 'MRO',
            ],
            [
                'currency_name' => 'MUR Mauritius Rupee',
                'currency_icon' => '₨',
                'currency_code' => 'MUR',
            ],
            [
                'currency_name' => 'MVR Maldives Rufiyaa',
                'currency_icon' => '.ރ',
                'currency_code' => 'MVR',
            ],
            [
                'currency_name' => 'MWK Malawi Kwacha',
                'currency_icon' => 'MK',
                'currency_code' => 'MWK',
            ],
            [
                'currency_name' => 'MXN Mexico Peso',
                'currency_icon' => '$',
                'currency_code' => 'MXN',
            ],
            [
                'currency_name' => 'MYR Malaysia Ringgit',
                'currency_icon' => 'RM',
                'currency_code' => 'MYR',
            ],
            [
                'currency_name' => 'MZN Mozambique Metical',
                'currency_icon' => 'MT',
                'currency_code' => 'MZN',
            ],
            [
                'currency_name' => 'NAD Namibia Dollar',
                'currency_icon' => '$',
                'currency_code' => 'NAD',
            ],
            [
                'currency_name' => 'NGN Nigeria Naira',
                'currency_icon' => '₦',
                'currency_code' => 'NGN',
            ],
            [
                'currency_name' => 'NIO Nicaragua Cordoba',
                'currency_icon' => 'C$',
                'currency_code' => 'NIO',
            ],
            [
                'currency_name' => 'NOK Norway Krone',
                'currency_icon' => 'kr',
                'currency_code' => 'NOK',
            ],
            [
                'currency_name' => 'NPR Nepal Rupee',
                'currency_icon' => '₨',
                'currency_code' => 'NPR',
            ],
            [
                'currency_name' => 'NZD New Zealand Dollar',
                'currency_icon' => '$',
                'currency_code' => 'NZD',
            ],
            [
                'currency_name' => 'PAB Panama Balboa',
                'currency_icon' => 'B/.',
                'currency_code' => 'PAB',
            ],
            [
                'currency_name' => 'PEN Peru Nuevo Sol',
                'currency_icon' => 'S/.',
                'currency_code' => 'PEN',
            ],
            [
                'currency_name' => 'PGK Papua New Guinea Kina',
                'currency_icon' => 'K',
                'currency_code' => 'PGK',
            ],
            [
                'currency_name' => 'PHP Philippines Peso',
                'currency_icon' => '₱',
                'currency_code' => 'PHP',
            ],
            [
                'currency_name' => 'PKR Pakistan Rupee',
                'currency_icon' => '₨',
                'currency_code' => 'PKR',
            ],
            [
                'currency_name' => 'PLN Poland Zloty',
                'currency_icon' => 'zł',
                'currency_code' => 'PLN',
            ],
            [
                'currency_name' => 'QAR Qatar Riyal',
                'currency_icon' => '﷼',
                'currency_code' => 'QAR',
            ],
            [
                'currency_name' => 'RON Romania New Leu',
                'currency_icon' => 'lei',
                'currency_code' => 'RON',
            ],
            [
                'currency_name' => 'RSD Serbia Dinar',
                'currency_icon' => 'Дин.',
                'currency_code' => 'RSD',
            ],
            [
                'currency_name' => 'RUB Russia Ruble',
                'currency_icon' => '₽',
                'currency_code' => 'RUB',
            ],
            [
                'currency_name' => 'SAR Saudi Arabia Riyal',
                'currency_icon' => '﷼',
                'currency_code' => 'SAR',
            ],
            [
                'currency_name' => 'SBD Solomon Islands Dollar',
                'currency_icon' => '$',
                'currency_code' => 'SBD',
            ],
            [
                'currency_name' => 'SCR Seychelles Rupee',
                'currency_icon' => '₨',
                'currency_code' => 'SCR',
            ],
            [
                'currency_name' => 'SEK Sweden Krona',
                'currency_icon' => 'kr',
                'currency_code' => 'SEK',
            ],
            [
                'currency_name' => 'SGD Singapore Dollar',
                'currency_icon' => '$',
                'currency_code' => 'SGD',
            ],
            [
                'currency_name' => 'SHP Saint Helena Pound',
                'currency_icon' => '£',
                'currency_code' => 'SHP',
            ],
            [
                'currency_name' => 'SLL Sierra Leone Leone',
                'currency_icon' => 'Le',
                'currency_code' => 'SLL',
            ],
            [
                'currency_name' => 'SOS Somalia Shilling',
                'currency_icon' => 'S',
                'currency_code' => 'SOS',
            ],
            [
                'currency_name' => 'SRD Suriname Dollar',
                'currency_icon' => '$',
                'currency_code' => 'SRD',
            ],
            [
                'currency_name' => 'STD São Tomé and Príncipe Dobra',
                'currency_icon' => 'Db',
                'currency_code' => 'STD',
            ],
            [
                'currency_name' => 'SZL Eswatini lilangeni',
                'currency_icon' => 'L',
                'currency_code' => 'SZL',
            ],
            [
                'currency_name' => 'THB Thailand Baht',
                'currency_icon' => '฿',
                'currency_code' => 'THB',
            ],
            [
                'currency_name' => 'TJS Tajikistan Somoni',
                'currency_icon' => 'ЅM',
                'currency_code' => 'TJS',
            ],
            [
                'currency_name' => 'TOP Tonga Pa’anga',
                'currency_icon' => 'T$',
                'currency_code' => 'TOP',
            ],
            [
                'currency_name' => 'TRY Turkey Lira',
                'currency_icon' => '₺',
                'currency_code' => 'TRY',
            ],
            [
                'currency_name' => 'TTD Trinidad and Tobago Dollar',
                'currency_icon' => 'TT$',
                'currency_code' => 'TTD',
            ],
            [
                'currency_name' => 'TWD Taiwan New Dollar',
                'currency_icon' => 'NT$',
                'currency_code' => 'TWD',
            ],
            [
                'currency_name' => 'TZS Tanzania Shiling',
                'currency_icon' => 'TSh',
                'currency_code' => 'TZS',
            ],
            [
                'currency_name' => 'UAH Ukraine Hryvna',
                'currency_icon' => '₴',
                'currency_code' => 'UAH',
            ],
            [
                'currency_name' => 'UYU Uruguay Peso',
                'currency_icon' => '$U',
                'currency_code' => 'UYU',
            ],
            [
                'currency_name' => 'UZS Uzbekistan Som',
                'currency_icon' => 'лв',
                'currency_code' => 'UZS',
            ],
            [
                'currency_name' => 'WST Samoa  Tālā',
                'currency_icon' => 'WS$',
                'currency_code' => 'WST',
            ],
            [
                'currency_name' => 'XCD Eastern Caribbean States Dollar',
                'currency_icon' => '$',
                'currency_code' => 'XCD',
            ],
            [
                'currency_name' => 'YER Yemen Rial',
                'currency_icon' => '﷼',
                'currency_code' => 'YER',
            ],
            [
                'currency_name' => 'ZAR South Africa Rand',
                'currency_icon' => 'R',
                'currency_code' => 'ZAR',
            ],
            [
                'currency_name' => 'ZMW Zambia Kwacha',
                'currency_icon' => 'ZK',
                'currency_code' => 'ZMW',
            ],
            //Zero Decimal Currencies
            [
                'currency_name' => 'BIF Burundi Franc',
                'currency_icon' => 'FBu',
                'currency_code' => 'BIF',
            ],
            [
                'currency_name' => 'CLP Chile Peso',
                'currency_icon' => '$',
                'currency_code' => 'CLP',
            ],
            [
                'currency_name' => 'DJF Djibouti Franc',
                'currency_icon' => 'Fdj',
                'currency_code' => 'DJF',
            ],
            [
                'currency_name' => 'GNF Guinea Franc',
                'currency_icon' => 'GFr',
                'currency_code' => 'GNF',
            ],
            [
                'currency_name' => 'JPY Japan Yen',
                'currency_icon' => '¥',
                'currency_code' => 'JPY',
            ],
            [
                'currency_name' => 'KMF Comoros Franc',
                'currency_icon' => 'CF',
                'currency_code' => 'KMF',
            ],
            [
                'currency_name' => 'KRW Korea Won',
                'currency_icon' => '₩',
                'currency_code' => 'KRW',
            ],
            [
                'currency_name' => 'MGA Madagascar Ariary ',
                'currency_icon' => 'Ar',
                'currency_code' => 'MGA',
            ],
            [
                'currency_name' => 'PYG Paraguay Guarani',
                'currency_icon' => 'Gs',
                'currency_code' => 'PYG',
            ],
            [
                'currency_name' => 'RWF Rwanda Franc',
                'currency_icon' => 'R₣',
                'currency_code' => 'RWF',
            ],
            [
                'currency_name' => 'UGX Uganda Shilling',
                'currency_icon' => 'USh',
                'currency_code' => 'UGX',
            ],
            [
                'currency_name' => 'VND Viet Nam Dong',
                'currency_icon' => '₫',
                'currency_code' => 'VND',
            ],
            [
                'currency_name' => 'VUV Vanuatu Vatu',
                'currency_icon' => 'VT',
                'currency_code' => 'VUV',
            ],
            [
                'currency_name' => 'XAF Central Africa Central African CFA Franc',
                'currency_icon' => 'FCFA',
                'currency_code' => 'XAF',
            ],
            [
                'currency_name' => 'XOF West Africa West African CFA Franc',
                'currency_icon' => 'CFA',
                'currency_code' => 'XOF',
            ],
            [
                'currency_name' => 'XPF France Franc',
                'currency_icon' => '₣',
                'currency_code' => 'XPF',
            ],
        ];

        foreach ($input as $data) {
            Currency::create($data);
        }
    }
}
