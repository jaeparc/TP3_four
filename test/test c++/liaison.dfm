object Form1: TForm1
  Left = 0
  Top = 0
  Caption = 'Form1'
  ClientHeight = 300
  ClientWidth = 635
  Color = clBtnFace
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'Tahoma'
  Font.Style = []
  OldCreateOrder = False
  PixelsPerInch = 96
  TextHeight = 13
  object Label1: TLabel
    Left = 248
    Top = 24
    Width = 31
    Height = 13
    Caption = 'Label1'
  end
  object activer: TButton
    Left = 176
    Top = 80
    Width = 75
    Height = 25
    Caption = 'activer'
    TabOrder = 0
    OnClick = activerClick
  end
  object desactiver: TButton
    Left = 336
    Top = 80
    Width = 75
    Height = 25
    Caption = 'desactiver'
    TabOrder = 1
    OnClick = desactiverClick
  end
  object Memo1: TMemo
    Left = 200
    Top = 136
    Width = 185
    Height = 89
    Lines.Strings = (
      'Memo1')
    TabOrder = 2
  end
  object IdTCPServer1: TIdTCPServer
    Bindings = <>
    DefaultPort = 0
    OnConnect = IdTCPServer1Connect
    OnExecute = IdTCPServer1Execute
    Left = 520
    Top = 224
  end
end
