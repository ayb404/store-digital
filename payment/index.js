const countriesData = [
  'Afghanistan',
  'Albania',
  'Algeria',
  'American Samoa',
  'Andorra',
  'Angola',
  'Anguilla',
  'Antarctica',
  'Antigua and Barbuda',
  'Argentina',
  'Armenia',
  'Aruba',
  'Australia',
  'Austria',
  'Azerbaijan',
  'Bahamas (the)',
  'Bahrain',
  'Bangladesh',
  'Barbados',
  'Belarus',
  'Belgium',
  'Belize',
  'Benin',
  'Bermuda',
  'Bhutan',
  'Bolivia (Plurinational State of)',
  'Bonaire, Sint Eustatius and Saba',
  'Bosnia and Herzegovina',
  'Botswana',
  'Bouvet Island',
  'Brazil',
  'British Indian Ocean Territory (the)',
  'Brunei Darussalam',
  'Bulgaria',
  'Burkina Faso',
  'Burundi',
  'Cabo Verde',
  'Cambodia',
  'Cameroon',
  'Canada',
  'Cayman Islands (the)',
  'Central African Republic (the)',
  'Chad',
  'Chile',
  'China',
  'Christmas Island',
  'Cocos (Keeling) Islands (the)',
  'Colombia',
  'Comoros (the)',
  'Congo (the Democratic Republic of the)',
  'Congo (the)',
  'Cook Islands (the)',
  'Costa Rica',
  'Croatia',
  'Cuba',
  'Curaçao',
  'Cyprus',
  'Czechia',
  "Côte d'Ivoire",
  'Denmark',
  'Djibouti',
  'Dominica',
  'Dominican Republic (the)',
  'Ecuador',
  'Egypt',
  'El Salvador',
  'Equatorial Guinea',
  'Eritrea',
  'Estonia',
  'Eswatini',
  'Ethiopia',
  'Falkland Islands (the) [Malvinas]',
  'Faroe Islands (the)',
  'Fiji',
  'Finland',
  'France',
  'French Guiana',
  'French Polynesia',
  'French Southern Territories (the)',
  'Gabon',
  'Gambia (the)',
  'Georgia',
  'Germany',
  'Ghana',
  'Gibraltar',
  'Greece',
  'Greenland',
  'Grenada',
  'Guadeloupe',
  'Guam',
  'Guatemala',
  'Guernsey',
  'Guinea',
  'Guinea-Bissau',
  'Guyana',
  'Haiti',
  'Heard Island and McDonald Islands',
  'Holy See (the)',
  'Honduras',
  'Hong Kong',
  'Hungary',
  'Iceland',
  'India',
  'Indonesia',
  'Iran (Islamic Republic of)',
  'Iraq',
  'Ireland',
  'Isle of Man',
  'Israel',
  'Italy',
  'Jamaica',
  'Japan',
  'Jersey',
  'Jordan',
  'Kazakhstan',
  'Kenya',
  'Kiribati',
  "Korea (the Democratic People's Republic of)",
  'Korea (the Republic of)',
  'Kuwait',
  'Kyrgyzstan',
  "Lao People's Democratic Republic (the)",
  'Latvia',
  'Lebanon',
  'Lesotho',
  'Liberia',
  'Libya',
  'Liechtenstein',
  'Lithuania',
  'Luxembourg',
  'Macao',
  'Madagascar',
  'Malawi',
  'Malaysia',
  'Maldives',
  'Mali',
  'Malta',
  'Marshall Islands (the)',
  'Martinique',
  'Mauritania',
  'Mauritius',
  'Mayotte',
  'Mexico',
  'Micronesia (Federated States of)',
  'Moldova (the Republic of)',
  'Monaco',
  'Mongolia',
  'Montenegro',
  'Montserrat',
  'Morocco',
  'Mozambique',
  'Myanmar',
  'Namibia',
  'Nauru',
  'Nepal',
  'Netherlands (the)',
  'New Caledonia',
  'New Zealand',
  'Nicaragua',
  'Niger (the)',
  'Nigeria',
  'Niue',
  'Norfolk Island',
  'Northern Mariana Islands (the)',
  'Norway',
  'Oman',
  'Pakistan',
  'Palau',
  'Palestine, State of',
  'Panama',
  'Papua New Guinea',
  'Paraguay',
  'Peru',
  'Philippines (the)',
  'Pitcairn',
  'Poland',
  'Portugal',
  'Puerto Rico',
  'Qatar',
  'Republic of North Macedonia',
  'Romania',
  'Russian Federation (the)',
  'Rwanda',
  'Réunion',
  'Saint Barthélemy',
  'Saint Helena, Ascension and Tristan da Cunha',
  'Saint Kitts and Nevis',
  'Saint Lucia',
  'Saint Martin (French part)',
  'Saint Pierre and Miquelon',
  'Saint Vincent and the Grenadines',
  'Samoa',
  'San Marino',
  'Sao Tome and Principe',
  'Saudi Arabia',
  'Senegal',
  'Serbia',
  'Seychelles',
  'Sierra Leone',
  'Singapore',
  'Sint Maarten (Dutch part)',
  'Slovakia',
  'Slovenia',
  'Solomon Islands',
  'Somalia',
  'South Africa',
  'South Georgia and the South Sandwich Islands',
  'South Sudan',
  'Spain',
  'Sri Lanka',
  'Sudan (the)',
  'Suriname',
  'Svalbard and Jan Mayen',
  'Sweden',
  'Switzerland',
  'Syrian Arab Republic',
  'Taiwan',
  'Tajikistan',
  'Tanzania, United Republic of',
  'Thailand',
  'Timor-Leste',
  'Togo',
  'Tokelau',
  'Tonga',
  'Trinidad and Tobago',
  'Tunisia',
  'Turkey',
  'Turkmenistan',
  'Turks and Caicos Islands (the)',
  'Tuvalu',
  'Uganda',
  'Ukraine',
  'United Arab Emirates (the)',
  'United Kingdom of Great Britain and Northern Ireland (the)',
  'United States Minor Outlying Islands (the)',
  'United States of America (the)',
  'Uruguay',
  'Uzbekistan',
  'Vanuatu',
  'Venezuela (Bolivarian Republic of)',
  'Viet Nam',
  'Virgin Islands (British)',
  'Virgin Islands (U.S.)',
  'Wallis and Futuna',
  'Western Sahara',
  'Yemen',
  'Zambia',
  'Zimbabwe',
  'Åland Islands',
];
const countyList = document.querySelector('#country-list');
const searchField = document.querySelector('#search-field');
const chosenCountry = document.querySelector('#chosen-country');
const hiddenArea = document.querySelector('#hidden-area');
const arrow = document.querySelector('#arrow')
let displayedCountries;
hiddenArea.hidden = true
document.onclick = () => {
  hiddenArea.hidden =
    chosenCountry != document.activeElement &&
    searchField != document.activeElement;
arrow.style.rotate = hiddenArea.hidden ? '0deg' : '180deg'
};

const fillCountyList = array => {
  array.forEach(country => {
    const div = document.createElement('div');
    div.innerText = country;
    div.classList.add('country');
    countyList.append(div);
  });
};
fillCountyList(countriesData);
displayedCountries = document.querySelectorAll('.country');

searchField.addEventListener('input', e => {
  countyList.innerText = '';
  const value = e.target.value;
  const filteredList = countriesData.filter(country =>
    country.toLowerCase().startsWith(value)
  );
  displayedCountries = document.querySelectorAll('.country');
  fillCountyList(filteredList);
});

const globalListner = (type, selector, callback) => {
  document.addEventListener(type, e => {
    if (e.target.matches(selector)) callback(e);
  });
};

globalListner('click', '.country', e => {
  chosenCountry.value = e.target.innerText;
  searchField.value = '';
  countyList.innerText = '';
  fillCountyList(countriesData);
  displayedCountries = document.querySelectorAll('.country');
  displayedCountries.forEach(country => {
    if (country.innerText == e.target.innerText){
      country.classList.add('selected');
      const topPos = country.offsetTop;
      countyList.scrollTop = topPos;
    }
  });
});
hiddenArea.addEventListener('mouseover', e => {
  const selected = document.querySelector('.selected');
  if (!e.target.matches('.selected') && e.target.matches('.country'))
    selected && selected.classList.add('selected-blur');
  else selected && selected.classList.remove('selected-blur');
});

const defaultLabelStyle = {
  top: '12px',
  left: '12px',
  padding: '2px 0',
  'font-size': '14px',
  color: '#4d4d4d',
  margin: '0',
};
const shrinkLabelStyle = {
  top: '-12px',
  left: '15px',
  'font-size': '12px',
  color: 'black',
};
const delayedLabelAnimation = { padding: '2px 5px', margin: '0 -5px' };

const animateLabel = e => {
  const label = $(`label[for=${e.target.id}]`);
  if (e.target.value.length) {
    label.css(shrinkLabelStyle);
    setTimeout(() => label.css(delayedLabelAnimation), 200);
  } else label.css(defaultLabelStyle);
};

globalListner('input', '.main-inputs', animateLabel);

$('.description-crypto').hide()

$('input[type=radio]').change(e => {
  $('.payment-description').slideToggle(200)
})