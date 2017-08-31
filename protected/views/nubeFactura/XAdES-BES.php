<?xml version="1.0" encoding="UTF-8"?>
<documento id="documento">
    <titulo id="titulo">Documento de pruebas</titulo>
    <descripcion id="descripcion">Documento destinado a realizar pruebas de firma</descripcion>
    <ds:Signature xmlns:ds="http://www.w3.org/2000/09/xmldsig#" xmlns:etsi="http://uri.etsi.org/01903/v1.3.2#" Id="Signature504735">
        <ds:SignedInfo Id="Signature-SignedInfo1024952">
            <ds:CanonicalizationMethod Algorithm="http://www.w3.org/TR/2001/REC-xml-c14n-20010315"/>
            <ds:SignatureMethod Algorithm="http://www.w3.org/2000/09/xmldsig#rsa-sha1"/>
            <ds:Reference Id="SignedPropertiesID429729" Type="http://uri.etsi.org/01903#SignedProperties" URI="#Signature504735-SignedProperties48056">
                <ds:DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"/>
                <ds:DigestValue><!-- Digest del elemento referenciado en Base64 --></ds:DigestValue>
            </ds:Reference>
            <ds:Reference URI="#Certificate1237555">
                <ds:DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"/>
                <ds:DigestValue><!-- Digest del elemento referenciado en Base64 --></ds:DigestValue>
            </ds:Reference>
            <ds:Reference Id="Reference-ID-200615" URI="">
                <ds:DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"/>
                <ds:DigestValue><!-- Digest del elemento referenciado en Base64 --></ds:DigestValue>
            </ds:Reference>
        </ds:SignedInfo>
        <ds:SignatureValue Id="SignatureValue552465">
            <!-- Valor de la firma en Base64 -->
        </ds:SignatureValue>
        <ds:KeyInfo Id="Certificate1237555">
            <ds:X509Data>
                <ds:X509Certificate>
                    <!-- Certificado firmante en Base64 -->
                </ds:X509Certificate>
            </ds:X509Data>
            <ds:KeyValue>
                <ds:RSAKeyValue>
                    <ds:Modulus><!-- Módulo de la clave RSA en Base64 --></ds:Modulus>
                    <ds:Exponent><!-- Exponente de la clave RSA en Base64 --></ds:Exponent>
                </ds:RSAKeyValue>
            </ds:KeyValue>
        </ds:KeyInfo>
        <ds:Object Id="Signature504735-Object873466">
            <etsi:QualifyingProperties Target="#Signature504735">
                <etsi:SignedProperties Id="Signature504735-SignedProperties48056">
                    <etsi:SignedSignatureProperties>
                        <etsi:SigningTime><!-- Fecha y hora de la firma --></etsi:SigningTime>
                        <etsi:SigningCertificate>
                            <etsi:Cert>
                                <etsi:CertDigest>
                                    <ds:DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"/>
                                    <ds:DigestValue><!-- Digest del certificado en Base64 --></ds:DigestValue>
                                </etsi:CertDigest>
                                <etsi:IssuerSerial>
                                    <ds:X509IssuerName><!-- Nombre de emisión del certificado firmante --></ds:X509IssuerName>
                                    <ds:X509SerialNumber><!-- Número de serie del certificado firmante --></ds:X509SerialNumber>
                                </etsi:IssuerSerial>
                            </etsi:Cert>
                        </etsi:SigningCertificate>
                    </etsi:SignedSignatureProperties>
                    <etsi:SignedDataObjectProperties>
                        <etsi:DataObjectFormat ObjectReference="#Reference-ID-200615">
                            <etsi:Description><!-- Descripcion del objeto firmado ---></etsi:Description>
                            <etsi:MimeType><!-- Tipo MIME del objeto firmado --></etsi:MimeType>
                        </etsi:DataObjectFormat>
                    </etsi:SignedDataObjectProperties>
                </etsi:SignedProperties>
            </etsi:QualifyingProperties>
        </ds:Object>
    </ds:Signature>
</documento>
