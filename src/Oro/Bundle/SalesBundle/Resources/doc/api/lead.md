# Oro\Bundle\SalesBundle\Entity\Lead

## ACTIONS

### get

Retrieve a specific lead record.

{@inheritdoc}

### get_list

Retrieve a collection of lead records.

{@inheritdoc}

### create

Create a new lead record.

The created record is returned in the response.

{@inheritdoc}

{@request:json_api}
Example:

```JSON
{  
   "data":{  
      "type":"leads",
      "id":"1",
      "attributes":{  
         "name":"Frank Lead"
      },
      "relationships":{  
         "owner":{  
            "data":{  
               "type":"users",
               "id":"1"
            }
         },
         "organization":{  
            "data":{  
               "type":"organizations",
               "id":"1"
            }
         },
         "customer":{
            "data":{
               "type":"b2bcustomers",
               "id":"9"
            }
         },
         "account":{
            "data":null
         },
         "status":{  
            "data":{  
               "type":"leadstatuses",
               "id":"new"
            }
         }
      }
   }
}
```
{@/request}

### update

Edit a specific lead record.

The updated record is returned in the response.

{@inheritdoc}

{@request:json_api}
Example:

```JSON
{  
   "data":{  
      "type":"leads",
      "id":"1",
      "attributes":{  
         "namePrefix":"Mr.",
         "jobTitle":"HR",
         "companyName":"Sure Save",
         "website":"http://qwe.qwe.qwe",
         "numberOfEmployees":"35",
         "phones":[  
            {  
               "phone":"225-56-78"
            }
         ],
         "emails":[  
            {  
               "email":"RamonaCVentersNew@gustr.com"
            }
         ]
      },
      "relationships":{  
         "contact":{  
            "data":{  
               "type":"contacts",
               "id":"4"
            }
         },
         "addresses":{  
            "data":[  
               {  
                  "type":"leadaddresses",
                  "id":"6"
               }
            ]
         },
         "account":{
            "data":{
               "type":"accounts",
               "id":"3"
            }
         },
         "status":{  
            "data":{  
               "type":"leadstatuses",
               "id":"Qualified"
            }
         }
      }
   }
}
```
{@/request}

### delete

Delete a specific lead record.

{@inheritdoc}

### delete_list

Delete a collection of lead records.

{@inheritdoc}

## FIELDS

### id

#### update

{@inheritdoc}

**The required field**

### status

#### create

{@inheritdoc}

**The required field**

**Please note:**

*This field is optional if the default value is set in the Lead entity configuration.
If this field is missing in the request, the default value is applied.*

#### update

{@inheritdoc}

**Please note:**

*This field is **required** and must remain defined.*

### name

#### create

{@inheritdoc}

**The required field**

#### update

{@inheritdoc}

**Please note:**

*This field is **required** and must remain defined.*

### emails

An array of email addresses.

Format of data: [{"email": first@email.com}, {"email": second@email.com}]

#### create, update

An array of email addresses.

Format of data: [{"email": first@email.com}, {"email": second@email.com}]

Data should contain full collection of email addresses of the lead.

### phones

An array of phone numbers.

Format of data: [{"phone": phonenumber1}, {"phone": phonenumber2}]

#### create, update

An array of phone numbers.

Format of data: [{"phone": phonenumber1}, {"phone": phonenumber2}]

Data should contain full collection of phone numbers of the lead.

### primaryEmail

Primary email address of the lead.

#### create, update

The email address that should be set as the primary one.

**Please note:**

*The primary email address will be added to **emails** collection if it does not contain it yet.*

### primaryPhone

Primary phone number of the lead.

#### create, update

The phone number that should be set as the primary one.

**Please note:**
 
*The primary phone number will be added to **phones** collection if it does not contain it yet.*

### customer

A customer the lead is assigned to.

#### create, update

{@inheritdoc}

**Please note:**

*The **customer** is related to the specific **account**.
In case when both fields (**account** and **customer**) are provided
the **customer** should be assigned to the specified **account**.*

### account

An account the lead is assigned to.

#### create, update

{@inheritdoc}

**Please note:**

*The **account** is related to the specific **customer**.
In case when both fields (**account** and **customer**) are provided
the **customer** should be assigned to the specified **account**.*

### campaign

The marketing campaign as a result of which the Lead was created

## SUBRESOURCES

### addresses

#### get_subresource

Retrieve a record of addresses assigned to a specific lead record.

#### get_relationship

Retrieve IDs of address records assigned to a specific lead record.

#### update_relationship

Replace the list of addresses assigned to a specific lead record.

{@request:json_api}
Example:

```JSON
{  
   "data":[  
      {  
         "type":"leadaddresses",
         "id":"6"
      }
   ]
}
```
{@/request}

#### add_relationship

Set address records for a specific lead record.

{@request:json_api}
Example:

```JSON
{  
   "data":[  
      {  
         "type":"leadaddresses",
         "id":"7"
      }
   ]
}
```
{@/request}

#### delete_relationship

Remove address records from a specific lead record.

### contact

#### get_subresource

Retrieve a contact record  assigned to a specific lead record.

#### get_relationship

Retrieve contact IDs assigned to a specific lead record.

#### update_relationship

Replace a contact record assigned to a specific lead record.

{@request:json_api}
Example:

```JSON
{
  "data": {
    "type": "contacts",
    "id": "6"
  }
}
```
{@/request}

### customer

#### get_subresource

Retrieve a customer records the opportunity is created for.

#### get_relationship

Retrieve the IDs a customer records the opportunity is created for.

#### update_relationship

Update a customer the opportunity is created for.

{@request:json_api}
Example:

```JSON
{
  "data": {
    "type": "b2bcustomers",
    "id": "1"
  }
}
```
{@/request}

### account

#### get_subresource

Retrieve an account record the opportunity is created for.

#### get_relationship

Retrieve the ID of an account record the opportunity is created for.

#### update_relationship

Update an account the opportunity is created for.

{@request:json_api}
Example:

```JSON
{
  "data": {
    "type": "accounts",
    "id": "1"
  }
}
```
{@/request}

### opportunities

#### get_subresource

Retrieve a record of an opportunity converted from a specific lead record.

#### get_relationship

Retrieve the ID of an opportunity record converted from a specific lead record.

#### update_relationship

Replace the opportunity record assigned to a specific lead record.

{@request:json_api}
Example:

```JSON
{
  "data": [
    {
      "type": "opportunities",
      "id": "5"
    }
  ]
}
```
{@/request}

#### add_relationship

Set an opportunity record for a specific lead record.

{@request:json_api}
Example:

```JSON
{
  "data": [
    {
      "type": "opportunities",
      "id": "54"
    }
  ]
}
```
{@/request}

#### delete_relationship

Remove an opportunity record assigned to a specific lead record.

### organization

#### get_subresource

Retrieve a record of an organization that a specific lead record belongs to.

#### get_relationship

Retrieve the ID of an organization record that a lead belongs to.

#### update_relationship

Replace the organization a specific lead belongs to

{@request:json_api}
Example:

```JSON
{
  "data": {
    "type": "organizations",
    "id": "1"
  }
}
```
{@/request}

### owner

#### get_subresource

Retrieve a record of the user who is the owner of a specific lead record.

#### get_relationship

Retrieve the ID of a user who is the owner of a specific lead record.

#### update_relationship

Replace the owner of a specific lead record.

{@request:json_api}
Example:

```JSON
{
  "data": {
    "type": "users",
    "id": "37"
  }
}
```
{@/request}

### source

#### get_subresource

Retrieve the source record configured for a specific lead record.

#### get_relationship

Retrieve the source of a specific lead record.

#### update_relationship

Replace the source of a specific lead record.

{@request:json_api}
Example:

```JSON
{
  "data": {
    "type": "leadsources",
    "id": "partner"
  }
}
```
{@/request}

### status

#### get_subresource

Retrieve the status record configured for a specific lead record.

#### get_relationship

Retrieve the ID of the status record configured for a specific lead record.

#### update_relationship

Replace the status of a specific lead record.

{@request:json_api}
Example:

```JSON
{
  "data": {
    "type": "leadstatuses",
    "id": "new"
  }
}
```
{@/request}

### campaign

#### get_subresource

Retrieve a record of campaign of a specific lead record.

#### get_relationship

Retrieve the ID of the campaign record of a specific lead record.

#### update_relationship

Replace the campaign of a specific lead record.

# Extend\Entity\EV_Lead_Status

## ACTIONS

### get

Retrieve a specific lead status record.

Lead status defines whether a lead is interested in your product (New, Qualified, Disqualified, etc.).

### get_list

Retrieve a collection of lead status records.

Lead status defines whether a lead is interested in your product (New, Qualified, Disqualified, etc.).


# Extend\Entity\EV_Lead_Source

## ACTIONS

### get

Retrieve a specific lead source record.

Lead source defines how the information about the lead was received.

### get_list

Retrieve a collection of lead source records.

Lead source defines how the information about the lead was received.
