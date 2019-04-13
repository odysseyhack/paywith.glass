# paywith.glass - Payments Infrastructure as a Service

Odyssey 2019 - Inclusive Banking

What's our entry?

Introducing the paywith.glass public REST API including

1. paywith.glass API Documentation with examples

2. paywith.glass example mobile application interaction via new API calls



The paywith.glass team objectives for the Odyssey 2019 Hackathon are:
1. The definition of the first Public REST API rules for the paywith.glass platform (v0.1)
2. The release of the initial documentation for this API
3. An example of the API in use via a demonstration of how a mobile application can make use of this API to communicate
with the platform.

================================================================================================================================

Section 1: The REST API
-----------------------

DESCRIPTION
-----------
paywith.glass uses a simple http REST API whereby calls go to the following address on port 443 (https):
  https://txn.paywith.glass
  
All calls are prefixed with the following php POST/GET headers:
  v=$VENDOR_DOMAIN_NAME
  cc=$VENDOR_COUNTRY_ID
  o=$USER_ID_HASH
  
  eg - https://txn.paywith.glass/

All calls must include identification of:
    1. The vendor via a unique domain name "$VENDOR_DOMAIN_NAME" (default is paywith.glass/smdwireless.com)
    2. The country code of the vendor under which the account falls "$VENDOR_COUNTRY_ID" (default is uk-uk,+00/amsterdam-nl,+02)
    3. The user account that is accessing the service under that vendor identified by PHP Session ID "$USER_ID_HASH".

User identification will be achieved via our looking.glass authentication infrastructure which defines these rules in way that
has already been standardized across our entire ecosystem.

looking.glass authentication relies on the user's php session id. If a user connects to the service with session ID that is recognized as being owned by a guest user, the default action returns the looking.glass login form.

Failure to present recognizable inputs for any of the prefix parameters result in a 301 redirection to https://paywith.glass.




Section 2: LIST of accepted $VENDOR_COUNTRY_ID codes by country:
---------------------------------------------------------------
Country name                    Vendor Country ID

Antigua & Barbuda               antigua-ag,-04
Australia                       sidney-au,+10
Barbados                        barbados-bb,-04
Belgium                         brussels-be,+02
Belize                          belize-bz,-06
Canada                          toronto-ca,-04
Dominica                        dominica-dm,-04
France                          paris-fr,+01
Germany                         berlin-de,+02
Ghana                           accra-gh,+00
Grenada                         grenada-gd,-04
Guyana                          guyana-gy,-04
Ireland                         ireland-ie,+00
Jamaica                         jamaica-jm,-05
New Zealand                     auckland-nz,+12
Nigeria                         lagos-ng,+01
South Africa                    johannesburg-za,+02
Spain                           madrid-es,+02
St. Vincent & the Grenadines    stvincent-vc,-04
St. Lucia                       stlucia-lc,-04
St. Kitts & Nevis               stkitts-kn,-04
Taiwan                          taipei-tw,+08
The Netherlands                 amsterdam-nl,+02
Trinidad & Tobago               trinidad-tt,-04
United Kingdom                  uk-uk,+00




Section 3: LIST OF ENDPOINTS
-----------------------------
[USER AUTHENTICATION/MANAGEMENT ENDPOINTS]
/fetchregistrationform - Accepts Boolean header flag for ToS.
                         1 = Accepted ToS which fetches looking.glass registration form matching vendor country
                         2 = Not yet accepted ToS which fetches looking.glass ToS form matching vendor country
                         ToS form may optionally contain vendor-specific clauses

/submitregistrationform - Accepts the following variables
                            -username
                            -email address
                            -Boolean flag for 'allow other users to email me'
                            -password hash
                            -registration visual verification code

/signin - Accepts the following variables
            -username
            -password hash
 
 
 /fetchprofile
 
 /changeavatar
 
 /securitysettings
 
 /notificationsettings


 
 [WALLET ROOT INTERFACE ENDPOINTS - Require user to first be authenticated]
 /fetchwalletdashboard - Fetches wallet dashboard.
                  -If wallet is unititialized, returns default wallet view with limited options
                  -If wallet is initialized, returns current balances, total balance
 
 /fetchdepositmenu - Fetches menu options for deposit actions
    (for example this replaces the current POST call:
     https://www.smdwireless.com/uk/?action=looking.glass.bar&depositmethod=creditdebit&refresh=loaddepositoptionssubmenu)
 
 
 /fetchpaymentmenu - Fetches menu options for payments and remittance actions
 
 /fetchwithdrawaloptions - Fetches menu options for withdrawal actions
 
 /fetchtransactionhistory - Fetches transaction history list for authenticated user
 
 /fetchwalletsettings - Fetches paywith.glass wallet settings menu
 
 /fetchwalletcart - Fetches current active shopping cart for authenticated user



[DEPOSIT MENU ENDPOINTS]


[PAYMENTS MENU ENDPOINTS]


[WITHDRAWAL MEUN ENDPOINTS]


[TRANSACTION HISTORY MENU ENDPOINTS]


[WALLET SETTINGS MENU ENDPOINTS]


[WALLET CART MENU ENDPOINTS]




Section 4: ENDPOINT RECEIVING INTERFACE CODE BASE FRAMEWORK
-----------------------------------------------------------

<?php
   $VENDOR_DOMAIN_NAME = false;
   $VENDOR_COUNTRY_ID = false;
   $USER_ID_HASH = false;
 
  foreach (getallheaders() as $headerkey => $headervalue) {
    if ($headerkey == 'v') {
      $VENDOR_DOMAIN_NAME = $headervalue;
      }
    elseif ($headerkey == 'cc') {
      $VENDOR_COUNTRY_ID =  $headervalue;
      }
    elseif ($headerkey == 'o') {
      $USER_ID_HASH = $headervalue;
      }
    }


if ( $VENDOR_DOMAIN_NAME && $VENDOR_COUNTRY_ID && $USER_ID_HASH ) {

        // Look up $VENDOR_DOMAIN_NAME and $VENDOR_COUNTRY_ID in db to determine the include file that should be loaded
        // If these are non-existent then bye-bye:
        // header("Location: https://paywith.glass");
        // die();

        // If they check out, then proceed:
        // Check if the user is logged in or not.
        // If logged in, present mobile application template from appropriate country then fetch requested data.
        
        // If not logged in, fetch login-page for the matched region.

        die();
        }

else {
        header("Location: https://paywith.glass");
        }

?>



Section 5: TODO
-----------------------------------------------------------
1. define list of endpoints and supported operations
2. Implement call / business logic of rest service to core system
3. look into swagger php docs?
4. start with vendordomainname, vendorcountryid and useridhash as Q params but if theres time look into moving those as header parameters to get a cleaner API.

5.Setup jenkins - DONE
