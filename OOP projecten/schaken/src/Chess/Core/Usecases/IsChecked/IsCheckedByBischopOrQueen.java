package Chess.Core.Usecases.IsChecked;

import Chess.Core.Board;
import Chess.Core.Color;
import Chess.Core.Coords;
import Chess.Core.Field;
import Chess.Core.Pieces.Bischop;
import Chess.Core.Pieces.Piece;
import Chess.Core.Pieces.Queen;
import Chess.Core.Pieces.Rook;
import Chess.Core.Usecases.LocateKing.LocateKing;

public class IsCheckedByBischopOrQueen extends IsChecked
{
    @Override
    public boolean execute(Board board, Color color) throws Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound
    {
        var kingLocation = locateKing.locate(board, color);
        var leftAbove = isCheckedLeftAbove(kingLocation, board, color);
        var leftUnder = isCheckedLeftUnder(kingLocation, board, color);
        var rightAbove = isCheckedRightAbove(kingLocation, board, color);
        var rightUnder = isCheckedRightUnder(kingLocation, board, color);
        return leftAbove || leftUnder || rightAbove || rightUnder;
    }

    private boolean isCheckedLeftAbove(Coords kingLocation, Board board, Color color) throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        var x = kingLocation.x();
        var y = kingLocation.y();
        while (x >= 1 && y <= 8)
            if (isOppositeBischopOrQueen(--x, ++y, board, color))
                return true;
            else if (pieceOnField(board, x, y))
                return false;
        return false;
    }

    private boolean isCheckedLeftUnder(Coords kingLocation, Board board, Color color) throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        var x = kingLocation.x();
        var y = kingLocation.y();
        while (x >= 1 && y >= 1)
            if (isOppositeBischopOrQueen(--x, --y, board, color))
                return true;
            else if (pieceOnField(board, x, y))
                return false;
        return false;
    }

    private boolean isCheckedRightAbove(Coords kingLocation, Board board, Color color) throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        var x = kingLocation.x();
        var y = kingLocation.y();
        while (x <= 8 && y <= 8)
            if (isOppositeBischopOrQueen(++x, ++y, board, color))
                return true;
            else if (pieceOnField(board, x, y))
                return false;
        return false;
    }

    private boolean isCheckedRightUnder(Coords kingLocation, Board board, Color color) throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        var x = kingLocation.x();
        var y = kingLocation.y();
        while (x <= 8 && y >= 1)
            if (isOppositeBischopOrQueen(++x, --y, board, color))
                return true;
            else if (pieceOnField(board, x, y))
                return false;
        return false;
    }

    private boolean isOppositeBischopOrQueen(int x, int y, Board board, Color color) throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        var coords = new Coords(x, y);
        if (!board.pieceOnField(coords))
            return false;
        var piece = board.getPiece(coords);
        var isBischop = piece instanceof Bischop;
        var isQueen = piece instanceof Queen;
        return (isBischop || isQueen) && piece.getColor() != color;
    }

    private boolean pieceOnField(Board board, int x, int y)
    {
        var coords = new Coords(x,y);
        return board.pieceOnField(coords);
    }
}